<?
$error = false;

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'users_set_db_connection': $_SESSION['core']['install']['users']['db_connection'] = $_POST['db_connection']; break;
        case 'users_set_ssh_connection': $_SESSION['core']['install']['users']['ssh_connection'] = $_POST['ssh_connection']; break;
        case 'users_set_admin': $_SESSION['core']['install']['users']['admin'] = $_POST['admin']; break;
        case 'users_set_sender': $_SESSION['core']['install']['users']['sender'] = $_POST['sender']; break;
        case 'users_set_settings': $_SESSION['core']['install']['users']['settings'] = $_POST['settings']; break;
    }
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Install Users</title>
    <meta charset="UTF-8">
    <meta name="robots" content="none">
    <style>
        .has-error {
            background: #fdd3d3;
        }
        .error {
            display: none;
        }
        .is-visible {
            display: block;
        }
    </style>
    <script src="<?= APP::Module('Routing')->root ?>public/js/jquery-3.1.0.min.js"></script>
</head>
<body>
    <h1>Install Users</h1>
    <?
    if (!$error) {
        if (!isset($_SESSION['core']['install']['users']['db_connection'])) {
            $error = true;
            ?>
            <h3>Select DB connection</h3>
            <form method="post">
                <input type="hidden" name="action" value="users_set_db_connection">
                <select name="db_connection">
                    <? foreach (array_keys(APP::Module('DB')->conf['connections']) as $connection) { ?><option value="<?= $connection ?>"><?= $connection ?></option><? } ?>
                </select>
                <br><br>
                <input type="submit" value="Next">
            </form>
            <?
        }
    }
    
    if (!$error) {
        if (!isset($_SESSION['core']['install']['users']['ssh_connection'])) {
            $error = true;

            // Build SSH connections array
            $ssh_connections = [];
            $tmp_ssh_connections = APP::Module('Registry')->Get(['module_ssh_connection'], ['id', 'value']);

            foreach (array_key_exists('module_ssh_connection', $tmp_ssh_connections) ? (array) $tmp_ssh_connections['module_ssh_connection'] : [] as $connection) {
                $ssh_connection_value = json_decode($connection['value'], 1);
                $ssh_connections[$connection['id']] = $ssh_connection_value[2] . '@' . $ssh_connection_value[0] . ':' . $ssh_connection_value[1];
            }
            ?>
            <h3>Select SSH connection</h3>
            <form method="post">
                <input type="hidden" name="action" value="users_set_ssh_connection">
                <select name="ssh_connection">
                    <? foreach ($ssh_connections as $ssh_connection_id => $ssh_connection_name) { ?><option value="<?= $ssh_connection_id ?>"><?= $ssh_connection_name ?></option><? } ?>
                </select>
                <br><br>
                <input type="submit" value="Next">
            </form>
            <?
        }
    }
    
    if (!$error) {
        if (!isset($_SESSION['core']['install']['users']['admin'])) {
            $error = true;
            ?>
            <h3>Create user</h3>
            <form method="post" id="create-user">
                <input type="hidden" name="action" value="users_set_admin">
                <label for="admin[email]">E-Mail</label>
                <br>
                <input type="email" id="admin_email" name="admin[email]" value="admin@<?= APP::$conf['location'][1] ?>">
                <br><br>
                <label for="admin_passowrd">Password</label>
                <br>
                <input id="admin_passowrd" type="password" name="admin[password]">
                <a href="javascript:void(0);" class="hide-password">Show</a>
                <div class="error"></div>
                <br><br>
                <label for="admin_retype_password">Password</label>
                <br>
                <input id="admin_retype_password" type="password" name="admin[retype-password]">
                <a href="javascript:void(0);" class="hide-password">Show</a>
                <div class="error"></div>
                <br><br>
                <input type="submit" value="Next">
            </form>
            <script>
                $('.hide-password').on('click', function() {
                    var $this = $(this),
                        $password_field = $this.prev('input');

                    ('password' == $password_field.attr('type')) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
                    ('Hide' == $this.text()) ? $this.text('Show') : $this.text('Hide');
                });

                $('#create-user').submit(function(event) {
                    var email = $(this).find('#admin_email');
                    var password = $(this).find('#admin_passowrd');
                    var re_password = $(this).find('#admin_retype_password');

                    email.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    password.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    re_password.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();

                    if (email.val() === '') { email.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('E-Mail not specified'); event.preventDefault(); }
                    if (password.val() === '') { password.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Password not specified'); event.preventDefault(); }
                    if (password.val() !== re_password.val()) { re_password.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Passwords do not match'); event.preventDefault(); }
                  });
            </script>
            <?
        }
    }
    
    if (!$error) {
        if (!isset($_SESSION['core']['install']['users']['sender'])) {
            $error = true;
            ?>
            <h3>Select notices sender</h3>
            <form method="post">
                <input type="hidden" name="action" value="users_set_sender">
                <select name="sender">
                    <? foreach ((array) APP::Module('DB')->Select(
                        APP::Module('Mail')->settings['module_mail_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
                        ['id', 'name', 'email'], 'mail_senders'
                    ) as $sender) { ?><option value="<?= $sender['id'] ?>"><?= $sender['email'] ?> (<?= $sender['name'] ?>)</option><? } ?>
                </select>
                <br><br>
                <input type="submit" value="Next">
            </form>
            <?
        }
    }
    
    if (!$error) {
        if (!isset($_SESSION['core']['install']['users']['settings'])) {
            $error = true;
            ?>
            <form method="post" id="users-settings">
                <input type="hidden" name="action" value="users_set_settings">
                <h3>Authentication</h3>
                
                <label for="module_users_check_rules">Check rules</label>
                <br>
                <select id="module_users_check_rules" name="settings[check_rules]">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                <div class="error"></div>
                <br><br>
                
                <label for="module_users_auth_token">Token auth</label>
                <br>
                <select id="module_users_auth_token" name="settings[auth_token]">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                <div class="error"></div>
                <br><br>
                
                <h3>Passwords</h3>
                
                <label for="module_users_min_pass_length">Minimum password length (register)</label>
                <br>
                <input id="module_users_min_pass_length" type="text" name="settings[min_pass_length]" value="3">
                <div class="error"></div>
                <br><br>

                <label for="module_users_gen_pass_length">Generated password length</label>
                <br>
                <input id="module_users_gen_pass_length" type="text" name="settings[gen_pass_length]" value="6">
                <div class="error"></div>
                <br><br>
                
                <h3>Services</h3>
                
                <label for="module_users_login_service">Login</label>
                <br>
                <select id="module_users_login_service" name="settings[login_service]">
                    <option value="1" selected>Enable</option>
                    <option value="0">Disable</option>
                </select>
                <div class="error"></div>
                <br><br>

                <label for="module_users_register_service">Register</label>
                <br>
                <select id="module_users_register_service" name="settings[register_service]">
                    <option value="1" selected>Enable</option>
                    <option value="0">Disable</option>
                </select>
                <div class="error"></div>
                <br><br>

                <label for="module_users_reset_password_service">Reset password</label>
                <br>
                <select id="module_users_reset_password_service" name="settings[reset_password_service]">
                    <option value="1" selected>Enable</option>
                    <option value="0">Disable</option>
                </select>
                <div class="error"></div>
                <br><br>

                <label for="module_users_change_password_service">Change password</label>
                <br>
                <select id="module_users_change_password_service" name="settings[change_password_service]">
                    <option value="1" selected>Enable</option>
                    <option value="0">Disable</option>
                </select>
                <div class="error"></div>
                <br><br>

                <h3>OAuth clients</h3>
                
                <h4>Facebook</h4>
        
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td><label for="module_users_oauth_client_fb_id">ID</label></td>
                        <td><label for="module_users_oauth_client_fb_key">Key</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="module_users_oauth_client_fb_id" type="text" name="settings[oauth_client_fb_id]" style="width: 300px; margin-right: 10px">
                            <div class="error"></div>
                        </td>
                        <td>
                            <input id="module_users_oauth_client_fb_key" type="text" name="settings[oauth_client_fb_key]" style="width: 300px">
                            <div class="error"></div>
                        </td>
                    </tr>
                </table>

                <h4>VK</h4>

                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td><label for="module_users_oauth_client_vk_id">ID</label></td>
                        <td><label for="module_users_oauth_client_vk_key">Key</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="module_users_oauth_client_vk_id" type="text" name="settings[oauth_client_vk_id]" style="width: 300px; margin-right: 10px">
                            <div class="error"></div>
                        </td>
                        <td>
                            <input id="module_users_oauth_client_vk_key" type="text" name="settings[oauth_client_vk_key]" style="width: 300px">
                            <div class="error"></div>
                        </td>
                    </tr>
                </table>

                <h4>Google</h4>

                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td><label for="module_users_oauth_client_google_id">ID</label></td>
                        <td><label for="module_users_oauth_client_google_key">Key</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="module_users_oauth_client_google_id" type="text" name="settings[oauth_client_google_id]" style="width: 300px; margin-right: 10px">
                            <div class="error"></div>
                        </td>
                        <td>
                            <input id="module_users_oauth_client_google_key" type="text" name="settings[oauth_client_google_key]" style="width: 300px">
                            <div class="error"></div>
                        </td>
                    </tr>
                </table>

                <h4>Yandex</h4>

                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td><label for="module_users_oauth_client_ya_id">ID</label></td>
                        <td><label for="module_users_oauth_client_ya_key">Key</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="module_users_oauth_client_ya_id" type="text" name="settings[oauth_client_ya_id]" style="width: 300px; margin-right: 10px">
                            <div class="error"></div>
                        </td>
                        <td>
                            <input id="module_users_oauth_client_ya_key" type="text" name="settings[oauth_client_ya_key]" style="width: 300px">
                            <div class="error"></div>
                        </td>
                    </tr>
                </table>

                <br><br>
                
                <h3>Timeouts</h3>
                
                <label for="module_users_timeout_activation">User activation</label>
                <br>
                <input id="module_users_timeout_activation" type="text" name="settings[timeout_activation]" value="1 week">
                <div class="error"></div>
                <br><br>

                <label for="module_users_timeout_email">Account E-Mail</label>
                <br>
                <input id="module_users_timeout_email" type="text" name="settings[timeout_email]" value="1 year">
                <div class="error"></div>
                <br><br>

                <label for="module_users_timeout_token">Auth token</label>
                <br>
                <input id="module_users_timeout_token" type="text" name="settings[timeout_token]" value="1 year">
                <div class="error"></div>
                <br><br>
                
                <h3>Other</h3>
                
                <label for="module_users_tmp_dir">Temp dir</label>
                <br>
                <input type="text" id="module_users_tmp_dir" name="settings[tmp_dir]" value="/tmp">
                <br><br>
                
                <label for="module_users_profile_picture">Profile picture</label>
                <br>
                <input type="text" id="module_users_profile_picture" name="settings[profile_picture]" value="public/ui/img/profile-pics/default.png">
                <br><br>
                
                <input type="submit" value="Next">
            </form>
            
            <script>
                $('#users-settings').submit(function(event) {
                    var module_users_check_rules = $(this).find('#module_users_check_rules');
                    var module_users_auth_token = $(this).find('#module_users_auth_token');
                    var module_users_min_pass_length = $(this).find('#module_users_min_pass_length');
                    var module_users_gen_pass_length = $(this).find('#module_users_gen_pass_length');
                    var module_users_login_service = $(this).find('#module_users_login_service');
                    var module_users_register_service = $(this).find('#module_users_register_service');
                    var module_users_reset_password_service = $(this).find('#module_users_reset_password_service');
                    var module_users_change_password_service = $(this).find('#module_users_change_password_service');
                    var module_users_timeout_token = $(this).find('#module_users_timeout_token');
                    var module_users_timeout_email = $(this).find('#module_users_timeout_email');
                    var module_users_timeout_activation = $(this).find('#module_users_timeout_activation');
                    var module_users_tmp_dir = $(this).find('#module_users_tmp_dir');
                    var module_users_profile_picture = $(this).find('#module_users_profile_picture');

                    module_users_auth_token.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_check_rules.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_min_pass_length.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_gen_pass_length.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_login_service.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_register_service.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_reset_password_service.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_change_password_service.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_timeout_token.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_timeout_email.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_timeout_activation.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_tmp_dir.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    module_users_profile_picture.removeClass('has-error').nextAll('.error').eq(0).removeClass('is-visible').empty();
                    
                    if (module_users_auth_token.val() === '') { module_users_auth_token.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_check_rules.val() === '') { module_users_check_rules.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_min_pass_length.val() === '') { module_users_min_pass_length.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_gen_pass_length.val() === '') { module_users_gen_pass_length.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_login_service.val() === '') { module_users_login_service.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_register_service.val() === '') { module_users_register_service.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_reset_password_service.val() === '') { module_users_reset_password_service.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_change_password_service.val() === '') { module_users_change_password_service.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_timeout_token.val() === '') { module_users_timeout_token.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_timeout_email.val() === '') { module_users_timeout_email.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_timeout_activation.val() === '') { module_users_timeout_activation.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_tmp_dir.val() === '') { module_users_tmp_dir.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                    if (module_users_profile_picture.val() === '') { module_users_profile_picture.addClass('has-error').nextAll('.error').eq(0).addClass('is-visible').html('Not specified'); event.preventDefault(); }
                });
            </script>
            <?
        }
    }
    ?>
</body>
</html>
<?
$content = ob_get_contents();
ob_end_clean();

if ($error) {
    echo $content;
    exit;
}

// Install module

$data->extractTo(ROOT);

$input = $_SESSION['core']['install']['users'];
$db = APP::Module('DB')->Open($input['db_connection']);

$db->query("
    SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
    SET time_zone = '+00:00';

    CREATE TABLE `users` (
      `id` int(10) UNSIGNED NOT NULL,
      `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
      `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
      `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
      `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `last_visit` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    
    INSERT INTO `users` (`id`, `email`, `password`, `role`, `reg_date`, `last_visit`) VALUES (0, '', '', 'default', NOW(), NOW());

    CREATE TABLE `users_accounts` (
      `id` int(11) UNSIGNED NOT NULL,
      `user_id` int(11) UNSIGNED NOT NULL,
      `service` enum('vk','fb','google','ya') CHARACTER SET utf8 NOT NULL,
      `extra` varchar(250) CHARACTER SET utf8 NOT NULL,
      `up_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    
    CREATE TABLE `users_about` (
      `id` bigint(20) UNSIGNED NOT NULL,
      `user` int(10) UNSIGNED NOT NULL,
      `item` enum('username','mobile_phone','twitter','skype') COLLATE utf8_unicode_ci NOT NULL,
      `value` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
      `up_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    ALTER TABLE `users`
      ADD PRIMARY KEY (`id`),
      ADD UNIQUE KEY `email` (`email`) USING BTREE,
      ADD KEY `email_password` (`email`,`password`) USING BTREE,
      ADD KEY `role_reg_date` (`role`,`reg_date`) USING BTREE;

    ALTER TABLE `users_accounts`
      ADD PRIMARY KEY (`id`),
      ADD KEY `user_id` (`user_id`),
      ADD KEY `service` (`service`);
      
    ALTER TABLE `users_about`
      ADD PRIMARY KEY (`id`),
      ADD KEY `user` (`user`),
      ADD KEY `user_item` (`user`,`item`) USING BTREE;

    ALTER TABLE `users` MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
    ALTER TABLE `users_accounts` MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
    ALTER TABLE `users_about` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

    ALTER TABLE `users_accounts` ADD CONSTRAINT `users_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
    ALTER TABLE `users_about` ADD CONSTRAINT `users_about_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;   

    ALTER TABLE `mail_events` ADD CONSTRAINT `mail_events_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
    ALTER TABLE `mail_log` ADD CONSTRAINT `mail_log_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
    ALTER TABLE `mail_queue` ADD CONSTRAINT `mail_queue_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
");

$db->query('INSERT INTO `users` (`id`, `email`, `password`, `role`, `reg_date`, `last_visit`) VALUES (NULL, "' . $input['admin']['email'] . '", "' . APP::Module('Crypt')->Encode($input['admin']['password']) . '", "admin", NOW(), NOW())');
//$user_id = $db->lastinsertid();

$db->query('INSERT INTO `mail_letters_groups` (`id`, `sub_id`, `name`, `up_date`) VALUES (NULL, 0, "Users", NOW())');
$users_group_id = $db->lastinsertid();

$db->query('INSERT INTO `mail_letters` (`id`, `group_id`, `sender`, `subject`, `html`, `plaintext`, `transport`, `priority`, `up_date`) VALUES (NULL, ' . $users_group_id . ', ' . $input['sender'] . ', "Welcome", "<h1>Welcome</h1>\r\n\r\nLogin page:\r\n<br>\r\n<a href=\"<?= APP::Module(\'Routing\')->root ?>users/actions/login\"><?= APP::Module(\'Routing\')->root ?>users/actions/login</a>\r\n<br>\r\n\r\n<h2>Login details</h2>\r\n<table border=\"0\" cellpadding=\"3\" width=\"300\">\r\n<tr>\r\n<td>E-Mail</td>\r\n<td><strong><?= $data[\'email\'] ?></strong></td>\r\n</tr>\r\n<tr>\r\n<td>Password</td>\r\n<td><strong><?= $data[\'password\'] ?></strong></td>\r\n</tr>\r\n</table>\r\n<br>\r\n\r\n<h2>Warning!</h2>\r\nYou must confirm your E-Mail address until <?= strftime(\'%e %B %Y\', $data[\'expire\']) ?>.\r\n<br>\r\nFollow the link to confirm your E-Mail address: <a href=\"<?= $data[\'link\'] ?>\" target=\"_blank\"><?= $data[\'link\'] ?></a>", "Welcome\r\n\r\nLogin page\r\n--------------------\r\n<?= APP::Module(\'Routing\')->root ?>users/actions/login\r\n\r\nLogin details\r\n--------------------\r\nE-Mail: <?= $data[\'email\'] ?>\r\nPassword: <?= $data[\'password\'] ?>\r\n\r\nWarning!\r\n--------------------\r\nYou must confirm your E-Mail address until <?= strftime(\'%e %B %Y\', $data[\'expire\']) ?>.\r\n\r\nFollow the link to confirm your E-Mail address:\r\n<?= $data[\'link\'] ?>", 1, 100, NOW());');
APP::Module('Registry')->Add('module_users_register_activation_letter', $db->lastinsertid());

$db->query('INSERT INTO `mail_letters` (`id`, `group_id`, `sender`, `subject`, `html`, `plaintext`, `transport`, `priority`, `up_date`) VALUES (NULL, ' . $users_group_id . ', ' . $input['sender'] . ', "Welcome", "<h1>Welcome</h1>\r\n\r\nLogin page:\r\n<br>\r\n<a href=\"<?= APP::Module(\'Routing\')->root ?>users/actions/login\"><?= APP::Module(\'Routing\')->root ?>users/actions/login</a>\r\n<br>\r\n\r\n<h2>Login details</h2>\r\n<table border=\"0\" cellpadding=\"3\" width=\"300\">\r\n<tr>\r\n<td>E-Mail</td>\r\n<td><strong><?= $data[\'email\'] ?></strong></td>\r\n</tr>\r\n<tr>\r\n<td>Password</td>\r\n<td><strong><?= $data[\'password\'] ?></strong></td>\r\n</tr>\r\n</table>\r\n<br>\r\n\r\n<h2>Warning!</h2>\r\nYou must confirm your E-Mail address until <?= strftime(\'%e %B %Y\', $data[\'expire\']) ?>.\r\n<br>\r\nFollow the link to confirm your E-Mail address: <a href=\"<?= $data[\'link\'] ?>\" target=\"_blank\"><?= $data[\'link\'] ?></a>", "Welcome\r\n\r\nLogin page\r\n--------------------\r\n<?= APP::Module(\'Routing\')->root ?>users/actions/login\r\n\r\nLogin details\r\n--------------------\r\nE-Mail: <?= $data[\'email\'] ?>\r\nPassword: <?= $data[\'password\'] ?>\r\n\r\nWarning!\r\n--------------------\r\nYou must confirm your E-Mail address until <?= strftime(\'%e %B %Y\', $data[\'expire\']) ?>.\r\n\r\nFollow the link to confirm your E-Mail address:\r\n<?= $data[\'link\'] ?>", 1, 100, NOW());');
APP::Module('Registry')->Add('module_users_subscribe_activation_letter', $db->lastinsertid());

$db->query('INSERT INTO `mail_letters` (`id`, `group_id`, `sender`, `subject`, `html`, `plaintext`, `transport`, `priority`, `up_date`) VALUES (NULL, ' . $users_group_id . ', ' . $input['sender'] . ', "Reset password", "<h1>Reset password</h1>\r\n\r\nFollow the link to set new password: <a href=\"<?= $data[\'link\'] ?>\" target=\"_blank\"><?= $data[\'link\'] ?></a>", "Reset password\r\n\r\nFollow the link to set new password: <?= $data[\'link\'] ?>", 1, 100, NOW())');
APP::Module('Registry')->Add('module_users_reset_password_letter', $db->lastinsertid());

$db->query('INSERT INTO `mail_letters` (`id`, `group_id`, `sender`, `subject`, `html`, `plaintext`, `transport`, `priority`, `up_date`) VALUES (NULL, ' . $users_group_id . ', ' . $input['sender'] . ', "Password successfully changed", "<h1>Password successfully changed</h1>\r\n\r\nLogin page:\r\n<br>\r\n<a href=\"<?= APP::Module(\'Routing\')->root ?>users/actions/login\"><?= APP::Module(\'Routing\')->root ?>users/actions/login</a>\r\n<br>\r\n\r\n<h2>Login details</h2>\r\n<table border=\"0\" cellpadding=\"3\" width=\"300\">\r\n<tr>\r\n<td>E-Mail</td>\r\n<td><strong><?= $data[\'email\'] ?></strong></td>\r\n</tr>\r\n<tr>\r\n<td>Password</td>\r\n<td><strong><?= $data[\'password\'] ?></strong></td>\r\n</tr>\r\n</table>", "Password successfully changed\r\n\r\nLogin page\r\n--------------------\r\n<?= APP::Module(\'Routing\')->root ?>users/actions/login\r\n\r\nLogin details\r\n--------------------\r\nE-Mail: <?= $data[\'email\'] ?>\r\nPassword: <?= $data[\'password\'] ?>", 1, 100, NOW());');
APP::Module('Registry')->Add('module_users_change_password_letter', $db->lastinsertid());

$db->query('INSERT INTO `mail_letters` (`id`, `group_id`, `sender`, `subject`, `html`, `plaintext`, `transport`, `priority`, `up_date`) VALUES (NULL, ' . $users_group_id . ', ' . $input['sender'] . ', "Welcome", "<h1>Welcome</h1>\r\n\r\nLogin page:\r\n<br>\r\n<a href=\"<?= APP::Module(\'Routing\')->root ?>users/actions/login\"><?= APP::Module(\'Routing\')->root ?>users/actions/login</a>\r\n<br>\r\n\r\n<h2>Login details</h2>\r\n<table border=\"0\" cellpadding=\"3\" width=\"300\">\r\n<tr>\r\n<td>E-Mail</td>\r\n<td><strong><?= $data[\'email\'] ?></strong></td>\r\n</tr>\r\n<tr>\r\n<td>Password</td>\r\n<td><strong><?= $data[\'password\'] ?></strong></td>\r\n</tr>\r\n</table>", "Welcome\r\n\r\nLogin page\r\n--------------------\r\n<?= APP::Module(\'Routing\')->root ?>users/actions/login\r\n\r\nLogin details\r\n--------------------\r\nE-Mail: <?= $data[\'email\'] ?>\r\nPassword: <?= $data[\'password\'] ?>", 1, 100, NOW());');
APP::Module('Registry')->Add('module_users_register_letter', $db->lastinsertid());

$sub_id_default = APP::Module('Registry')->Add('module_users_role', 'default');
$sub_id_new = APP::Module('Registry')->Add('module_users_role', 'new');
$sub_id_user = APP::Module('Registry')->Add('module_users_role', 'user');
$sub_id_admin = APP::Module('Registry')->Add('module_users_role', 'admin');

APP::Module('Registry')->Add('module_users_rule', '["users\\\/actions\\\/change-password(.*)","users\/actions\/login"]', $sub_id_default);
APP::Module('Registry')->Add('module_users_rule', '["users\\\/profile","users\/actions\/login"]', $sub_id_default);
APP::Module('Registry')->Add('module_users_rule', '["users\\\/api\\\/about\\\/update\\\.json","users\/actions\/login"]', $sub_id_default);
APP::Module('Registry')->Add('module_users_rule', '["admin(.*)","users\/actions\/login"]', $sub_id_default);
APP::Module('Registry')->Add('module_users_rule', '["admin(.*)","users\/actions\/login"]', $sub_id_new);
APP::Module('Registry')->Add('module_users_rule', '["admin(.*)","users\/actions\/login"]', $sub_id_user);

APP::Module('Registry')->Add('module_users_db_connection', $input['db_connection']);
APP::Module('Registry')->Add('module_users_ssh_connection', $input['ssh_connection']);
APP::Module('Registry')->Add('module_users_auth_token', $input['settings']['auth_token']);
APP::Module('Registry')->Add('module_users_check_rules', $input['settings']['check_rules']);
APP::Module('Registry')->Add('module_users_gen_pass_length', $input['settings']['gen_pass_length']);
APP::Module('Registry')->Add('module_users_min_pass_length', $input['settings']['min_pass_length']);
APP::Module('Registry')->Add('module_users_login_service', $input['settings']['login_service']);
APP::Module('Registry')->Add('module_users_register_service', $input['settings']['register_service']);
APP::Module('Registry')->Add('module_users_change_password_service', $input['settings']['change_password_service']);
APP::Module('Registry')->Add('module_users_reset_password_service', $input['settings']['reset_password_service']);
APP::Module('Registry')->Add('module_users_oauth_client_fb_id', $input['settings']['oauth_client_fb_id']);
APP::Module('Registry')->Add('module_users_oauth_client_fb_key', $input['settings']['oauth_client_fb_key']);
APP::Module('Registry')->Add('module_users_oauth_client_google_id', $input['settings']['oauth_client_google_id']);
APP::Module('Registry')->Add('module_users_oauth_client_google_key', $input['settings']['oauth_client_google_key']);
APP::Module('Registry')->Add('module_users_oauth_client_vk_id', $input['settings']['oauth_client_vk_id']);
APP::Module('Registry')->Add('module_users_oauth_client_vk_key', $input['settings']['oauth_client_vk_key']);
APP::Module('Registry')->Add('module_users_oauth_client_ya_id', $input['settings']['oauth_client_ya_id']);
APP::Module('Registry')->Add('module_users_oauth_client_ya_key', $input['settings']['oauth_client_ya_key']);
APP::Module('Registry')->Add('module_users_timeout_activation', $input['settings']['timeout_activation']);
APP::Module('Registry')->Add('module_users_timeout_email', $input['settings']['timeout_email']);
APP::Module('Registry')->Add('module_users_timeout_token', $input['settings']['timeout_token']);
APP::Module('Registry')->Add('module_users_tmp_dir', $input['settings']['tmp_dir']);
APP::Module('Registry')->Add('module_users_profile_picture', $input['settings']['profile_picture']);

APP::Module('Cron')->Add($input['ssh_connection'], ['*/1', '*', '*', '*', '*', 'php ' . ROOT . '/init.php Users NewUsersGC []']);

APP::Module('Triggers')->Register('user_logout', 'Users', 'Logout');
APP::Module('Triggers')->Register('user_activate', 'Users', 'Activate');
APP::Module('Triggers')->Register('remove_user', 'Users', 'Remove');
APP::Module('Triggers')->Register('add_user', 'Users', 'Add');
APP::Module('Triggers')->Register('user_login', 'Users', 'Login');
APP::Module('Triggers')->Register('user_double_login', 'Users', 'Double login');
APP::Module('Triggers')->Register('register_user', 'Users', 'Register');
APP::Module('Triggers')->Register('subscribe_user', 'Users', 'Subscribe');
APP::Module('Triggers')->Register('reset_user_password', 'Users', 'Reset password');
APP::Module('Triggers')->Register('change_user_password', 'Users', 'Change password');
APP::Module('Triggers')->Register('update_user', 'Users', 'Update');
APP::Module('Triggers')->Register('update_about_user', 'Users', 'Update about');

APP::Module('Triggers')->Register('add_user_role', 'Users / Roles', 'Add');
APP::Module('Triggers')->Register('remove_user_role', 'Users / Roles', 'Remove');

APP::Module('Triggers')->Register('add_user_rule', 'Users / Rules', 'Add');
APP::Module('Triggers')->Register('remove_user_rule', 'Users / Rules', 'Remove');
APP::Module('Triggers')->Register('update_user_rule', 'Users / Rules', 'Update');

APP::Module('Triggers')->Register('update_users_oauth_settings', 'Users / Settings', 'Update OAuth');
APP::Module('Triggers')->Register('update_users_notifications_settings', 'Users / Settings', 'Update notifications');
APP::Module('Triggers')->Register('update_users_services_settings', 'Users / Settings', 'Update services');
APP::Module('Triggers')->Register('update_users_auth_settings', 'Users / Settings', 'Update auth');
APP::Module('Triggers')->Register('update_users_passwords_settings', 'Users / Settings', 'Update passwords');
APP::Module('Triggers')->Register('update_users_timeouts_settings', 'Users / Settings', 'Update timeouts');
APP::Module('Triggers')->Register('update_users_other_settings', 'Users / Settings', 'Update other');