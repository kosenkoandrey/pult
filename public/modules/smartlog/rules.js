/**
 * @author Selivanov Max <max@evildevel.com>
 * 
 * Dependencies:
 * jquery.json (https://github.com/krinkle/jquery-json)
 * 
 */

(function($) {
    var methods = {
        init: function(options) { 
            $target_rules = $(this);

            var settings = $.extend( {
                'rules': $.evalJSON($(this).val()),
                'debug': false
            }, options);

            $('<div/>', {
                'id': 'trigger_rules_editor',
            }).insertAfter(this);

            $('<div/>', {
                'class': 'trigger_children',
            }).appendTo($('#trigger_rules_editor'));

            methods.render_rules(settings.rules, $('.trigger_children'));
            methods.checkblock();
            return this;
        },
        render_value: function(trigger_rule) { // .trigger_rule
            var value = {
                'logic': $('> table > tbody > tr > .trigger_logic_holder > .trigger_logic > select', trigger_rule).val()
            };

            var trigger_rule_item = $('> table > tbody > tr > .trigger_holder > .trigger_rules > .trigger_rule_item', trigger_rule);
            var trigger_children_rule = $('> table > tbody > tr > .trigger_holder > .trigger_children > .trigger_rule', trigger_rule);

            if (trigger_rule_item.length) {
                value.rules = [];

                trigger_rule_item.each(function() {
                    var method = $(this).data('method');
                    var settings = new Object();

                    $('.trigger_settings input, .trigger_settings select', this).each(function() {
                        id = $(this).data('id');
                        param_value = $(this).val();

                        if (param_value) {
                            switch(method) {
                                case 'trigger_id': 
                                    switch(id) {
                                        case 'logic': 
                                            if (settings.logic === undefined) settings.logic = new Object();
                                            settings.logic = param_value; 
                                            break;
                                        case 'value': 
                                            if (settings.value === undefined) settings.value = new Object();
                                            settings.value = param_value; 
                                            break;
                                        default: settings[id] = param_value;
                                    }
                                    break;
                                case 'object_id': 
                                    switch(id) {
                                        case 'logic': 
                                            if (settings.logic === undefined) settings.logic = new Object();
                                            settings.logic = param_value; 
                                            break;
                                        case 'value': 
                                            if (settings.value === undefined) settings.value = new Object();
                                            settings.value = param_value; 
                                            break;
                                        default: settings[id] = param_value;
                                    }
                                    break;
                                case 'user_id': 
                                    switch(id) {
                                        case 'logic': 
                                            if (settings.logic === undefined) settings.logic = new Object();
                                            settings.logic = param_value; 
                                            break;
                                        case 'value': 
                                            if (settings.value === undefined) settings.value = new Object();
                                            settings.value = param_value; 
                                            break;
                                        default: settings[id] = param_value;
                                    }
                                    break;
                                case 'cr_date': 
                                    switch(id) {
                                        case 'from': 
                                            if (settings.from === undefined) settings.from = new Object();
                                            settings.from = param_value; 
                                            break;
                                        case 'to': 
                                            if (settings.to === undefined) settings.to = new Object();
                                            settings.to = param_value; 
                                            break;
                                        default: settings[id] = param_value;
                                    }
                                    break;
                                default: settings[id] = param_value;
                            }
                        }
                    });

                    value.rules.push({
                        'method': method,
                        'settings': settings
                    });
                });
            }

            if (trigger_children_rule.length) {
                value.children = methods.render_value(trigger_children_rule);
            }

            return value;
        },
        add_trigger_rule: function() {
            var trigger_rule = $(this).closest('.trigger_rule');
            var trigger_logic = $(this).data('logic');
            var trigger_method = $(this).data('method');

            if (trigger_logic === $('> table > tbody > tr > .trigger_logic_holder > .trigger_logic > select', trigger_rule).val()) {
                methods.render_rule({
                    'method': trigger_method,
                    'settings': new Object()
                }, $('> table > tbody > tr > .trigger_holder > .trigger_rules', trigger_rule));
            } else {
                var trigger_children = $(trigger_rule).closest('.trigger_children');

                trigger_rule.remove();

                methods.render_rules({
                    'logic': trigger_logic,
                    'rules': [{
                        method: trigger_method,
                        'settings': new Object()
                    }],
                    'children': methods.render_value(trigger_rule)
                }, trigger_children);
            }   

            $('select', trigger_rule).selectpicker(); 
            $target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))));
            methods.checkblock();
            methods.check_editor();
        },
        remove_trigger_rule: function() {
            $(this).parent().parent().remove();
            $(this).siblings('.trigger_rule_item').remove();
            $target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))));
            methods.checkblock();
            methods.check_editor();
        },
        checkblock: function() {
            var value = $target_rules.val();
            var obj = JSON.parse(value);

            if (obj.rules === undefined || obj.rules.length == 1) {
                $('.trigger_logic_holder').css('width', '0');
                $('.trigger_logic_holder', $trigger_rule).hide();
            } else if (obj.rules && obj.rules.length > 1) {
                $('.trigger_logic_holder').css('width', '100px');
                $('.trigger_logic_holder', $trigger_rule).show();
            }
        },
        getRulesListByLogic: function(logic) {
            return [
                '<li><a class="add_trigger_rule" data-logic="' + logic + '" data-method="trigger_id" href="javascript:void(0)">Триггер</a></li>',
                '<li><a class="add_trigger_rule" data-logic="' + logic + '" data-method="object_id" href="javascript:void(0)">Объект</a></li>',
                '<li><a class="add_trigger_rule" data-logic="' + logic + '" data-method="user_id" href="javascript:void(0)">Пользователь</a></li>',
                '<li><a class="add_trigger_rule" data-logic="' + logic + '" data-method="cr_date" href="javascript:void(0)">Дата</a></li>',
            ].join('');
        },
        render_rules: function(rules, holder) {
            var self = this;

            $trigger_rule = $('<div/>', {
                'class': 'trigger_rule'
            }).appendTo(holder); 

            $trigger_rule.append([
                '<a style="display:none;" href="javascript:void(0)" class="remove_trigger_rule btn btn-default btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-close"></i></a>',
                '<table>',
                    '<tr>',
                        '<td class="trigger_logic_holder" style="width: 100px; vertical-align: middle;">',
                            '<div class="trigger_logic">',
                                '<select class="selectpicker" data-width="85px">',
                                    '<option value="intersect">AND</option>',
                                    '<option value="merge">OR</option>',
                                '</select>',
                            '</div>',
                        '</td>', 
                        '<td class="trigger_holder">',
                            '<div class="trigger_rules"></div>',
                            '<div class="trigger_children"></div>',
                            '<div class="btn-group trigger_holder_controls_several">',
                                '<div class="btn-group">',
                                    '<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">И</button>',
                                    '<ul class="dropdown-menu scrollable-menu scrollbar" role="menu">',                                  
                                        self.getRulesListByLogic('intersect'),
                                    '</ul>',
                                '</div>',
                                '<div class="btn-group">',
                                    '<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">ИЛИ</button>',
                                    '<ul class="dropdown-menu scrollable-menu scrollbar" role="menu">',
                                        self.getRulesListByLogic('merge'),
                                    '</ul>',
                                '</div>',
                            '</div>',
                            '<div class="btn-group trigger_holder_controls_single">',
                                '<div class="btn-group">',
                                    '<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Добавить условие</button>',
                                    '<ul class="dropdown-menu scrollable-menu scrollbar" role="menu">',                                  
                                        self.getRulesListByLogic('intersect'),
                                    '</ul>',
                                '</div>',
                            '</div>',
                        '</td>',
                    '<tr>',
                '</table>'
            ].join(''));
            $('.trigger_holder .remove_trigger_rule').show();

            $('.add_trigger_rule', $trigger_rule).on('click', methods.add_trigger_rule);

            $('.trigger_logic select', $trigger_rule).val(rules.logic).on('change', function(){$target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))))});
            $('.remove_trigger_rule').on('click', methods.remove_trigger_rule);
        
            if (rules.rules !== undefined) {
                $.each(rules.rules, function(index, rule) {
                    methods.render_rule(rule, $('.trigger_rules', $trigger_rule));
                });
            }

            if (rules.children !== undefined) {
                methods.render_rules(rules.children, $('.trigger_children', $trigger_rule));
            }
            
            $('.selectpicker').selectpicker(); 

            methods.check_editor();
        },
        check_editor: function() {
            $('.trigger_children').each(function (i, item) {
                var child_numbers = 0;
                $item = $(item);
                child_numbers += $item.find('.trigger_holder').first().find('.trigger_rules > div').length;
                child_numbers += $item.find('.trigger_holder').first().find('.trigger_children > div').length;
                if (child_numbers < 2) {
                    $(item).find('.trigger_logic').hide();
                    $(item).find('.trigger_logic_holder').hide();
                    $(item).find('.trigger_holder_controls_single').show();
                    $(item).find('.trigger_holder_controls_several').hide();
                } else {
                    $(item).find('.trigger_logic').show();
                    $(item).find('.trigger_logic_holder').show();
                    $(item).find('.trigger_holder_controls_single').hide();
                    $(item).find('.trigger_holder_controls_several').show(); 
                }
            })
        },
        render_rule: function(rule, holder) {
            var elid = Math.floor(Math.random( ) * (999999+1));
            
            $trigger_rule_item = $('<div/>', {
                'class': 'trigger_rule_item',
                'data-method': rule.method
            }).appendTo(holder);

            $trigger_rule_item.append([
                '<div class="trigger_settings">',
                    '<a href="javascript:void(0)" class="remove_rule_item btn btn-default btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-close"></i></a>',
                '</div>'
            ].join(''));

            $('.remove_rule_item').on('click', methods.remove_trigger_rule);

            switch(rule.method) {
                case 'trigger_id':
                    $('.trigger_settings', $trigger_rule_item).append([
                        '<table>',
                            '<tr>Триггер</tr>',
                            '<tr>',
                                '<td style="width: 125px">',
                                    '<select class="selectpicker" data-id="logic">',
                                        '<option value="=">equal</option>',
                                        '<option value="!=">not equal</option>',
                                        '<option value="IN">in</option>',
                                        '<optgroup label="mask">',
                                            '<option value="LIKE">equal</option>',
                                            '<option value="NOT LIKE">not equal</option>',
                                        '</optgroup>',
                                        '<optgroup label="regexp">',
                                            '<option value="REGEXP">equal</option>',
                                            '<option value="NOT REGEXP">not equal</option>',
                                        '</optgroup>',
                                    '</select>',
                                '</td>',
                                '<td style="width: 125px" id="user_sum_amount">',
                                    '<input data-id="value" class="form-control m-l-5" type="text" />',
                                '</td>',
                            '</tr>',
                        '</table>'
                    ].join(''));

                    if (rule.settings.value !== undefined) $('.trigger_settings input[data-id="value"]', $trigger_rule_item).val(rule.settings.value);
                    $('.trigger_settings input[data-id="value"]', $trigger_rule_item).on('input propertychange paste', function(){$target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))))});

                    if (rule.settings.logic !== undefined) $('.trigger_settings select[data-id="logic"]', $trigger_rule_item).val(rule.settings.logic);
                    $('.trigger_settings select[data-id="logic"]', $trigger_rule_item).on('change', function(){$target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))))});
                    
                    $('.selectpicker').selectpicker();
                    
                    break;
                    
                case 'object_id':
                    $('.trigger_settings', $trigger_rule_item).append([
                        '<table>',
                            '<tr>Объект</tr>',
                            '<tr>',
                                '<td style="width: 125px">',
                                    '<select class="selectpicker" data-id="logic">',
                                        '<option value="=">equal</option>',
                                        '<option value="!=">not equal</option>',
                                        '<option value="IN">in</option>',
                                        '<optgroup label="mask">',
                                            '<option value="LIKE">equal</option>',
                                            '<option value="NOT LIKE">not equal</option>',
                                        '</optgroup>',
                                        '<optgroup label="regexp">',
                                            '<option value="REGEXP">equal</option>',
                                            '<option value="NOT REGEXP">not equal</option>',
                                        '</optgroup>',
                                    '</select>',
                                '</td>',
                                '<td style="width: 125px">',
                                    '<input data-id="value" class="form-control m-l-5" type="text">',
                                '</td>',
                            '</tr>',
                        '</table>'
                    ].join(''));

                    if (rule.settings.logic !== undefined) $('.trigger_settings select[data-id="logic"]', $trigger_rule_item).val(rule.settings.logic);
                    $('.trigger_settings select[data-id="logic"]', $trigger_rule_item).on('change', function(){$target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))))});

                    if (rule.settings.value !== undefined) $('.trigger_settings input[data-id="value"]', $trigger_rule_item).val(rule.settings.value);
                    $('.trigger_settings input[data-id="value"]', $trigger_rule_item).on('input propertychange paste', function(){$target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))))});
                    
                    break;
                    
                case 'user_id':
                    $('.trigger_settings', $trigger_rule_item).append([
                        '<table>',
                            '<tr>ID пользователя</tr>',
                            '<tr>',
                                '<td style="width: 125px">',
                                    '<select class="selectpicker" data-id="logic">',
                                        '<option value="=">equal</option>',
                                        '<option value="!=">not equal</option>',
                                        '<option value="IN">in</option>',
                                        '<optgroup label="mask">',
                                            '<option value="LIKE">equal</option>',
                                            '<option value="NOT LIKE">not equal</option>',
                                        '</optgroup>',
                                        '<optgroup label="regexp">',
                                            '<option value="REGEXP">equal</option>',
                                            '<option value="NOT REGEXP">not equal</option>',
                                        '</optgroup>',
                                    '</select>',
                                '</td>',
                                '<td style="width: 125px">',
                                    '<input data-id="value" class="form-control m-l-5" type="text">',
                                '</td>',
                            '</tr>',
                        '</table>'
                    ].join(''));

                    if (rule.settings.logic !== undefined) $('.trigger_settings select[data-id="logic"]', $trigger_rule_item).val(rule.settings.logic);
                    $('.trigger_settings select[data-id="logic"]', $trigger_rule_item).on('change', function(){$target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))))});

                    if (rule.settings.value !== undefined) $('.trigger_settings input[data-id="value"]', $trigger_rule_item).val(rule.settings.value);
                    $('.trigger_settings input[data-id="value"]', $trigger_rule_item).on('input propertychange paste', function(){$target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))))});
                    
                    break;
                    
                case 'cr_date':
                    $('.trigger_settings', $trigger_rule_item).append([
                        '<table>',
                            '<tr>Дата</tr>',
                            '<tr>',
                                '<td>',
                                    '<div class="input-group m-r-5"><input id="datepicfrom" data-id="from" class="form-control" type="text" style="width: 66px"></div>',
                                '</td>',
                                '<td>-</td>',
                                '<td>',
                                    '<div class="input-group m-l-5"><input id="datepicto" data-id="to" class="form-control" type="text" style="width: 66px"></div>',
                                '</td>',
                            '</tr>',
                        '</table>'
                    ].join(''));
                    
                    $('#datepicfrom', $trigger_rule_item)
                    .datetimepicker({
                        format: 'YYYY-MM-DD',
                        defaultDate: new Date()
                    })
                    .on('dp.change', function(e) {
                        $target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))));
                    });
                    
                    $('#datepicto', $trigger_rule_item)
                    .datetimepicker({
                        format: 'YYYY-MM-DD',
                        defaultDate: new Date()
                    })
                    .on('dp.change', function(e) {
                        $target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))));
                    });
                    
                    if (rule.settings.from !== undefined) $('.trigger_settings input[data-id="from"]', $trigger_rule_item).val(rule.settings.from);
                    $('.trigger_settings input[data-id="from"]', $trigger_rule_item).on('input propertychange paste', function(){$target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))))});
                    
                    if (rule.settings.to !== undefined) $('.trigger_settings input[data-id="to"]', $trigger_rule_item).val(rule.settings.to);
                    $('.trigger_settings input[data-id="to"]', $trigger_rule_item).on('input propertychange paste', function(){$target_rules.val($.toJSON(methods.render_value($('#trigger_rules_editor > .trigger_children > .trigger_rule'))))});
                    
                    break;
            }
        }
    };

    $.fn.SmartLogRulesEditor = function(method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || ! method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('SmartLogRulesEditor: Unknown method: ' +  method);
        }
    };
})(jQuery);