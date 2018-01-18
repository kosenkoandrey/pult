<?
class QIWI {

    const QIWI_ERROR_FORMAT = '5';
    const QIWI_ERROR_SERVER_BUSY = '13';
    const QIWI_ILLEGAL_OPERATION = '78';
    const QIWI_AUTH_ERROR = '150';
    const QIWI_BILL_NOT_FOUND = '210';
    const QIWI_BILL_ALREADY_EXIST = '215';
    const QIWI_SMALL_AMOUNT = '241';
    const QIWI_BIG_AMOUNT = '242';
    const QIWI_TECHNICAL_ERROR = '300';

    private $errorsMap = array(
        self::QIWI_ERROR_FORMAT       => 'Неверный формат параметров запроса',
        self::QIWI_ERROR_SERVER_BUSY  => 'Сервер занят, повторите запрос позже',
        self::QIWI_ILLEGAL_OPERATION  => 'Недопустимая операция',
        self::QIWI_AUTH_ERROR         => 'Ошибка авторизации',
        self::QIWI_BILL_NOT_FOUND     => 'Счет не найден',
        self::QIWI_BILL_ALREADY_EXIST => 'Счет с таким ID уже существует',
        self::QIWI_SMALL_AMOUNT       => 'Сумма слишком мала',
        self::QIWI_BIG_AMOUNT         => 'Сумма слишком велика',
        self::QIWI_TECHNICAL_ERROR    => 'Техническая ошибка, повторите запрос позже',
    );

    private $lastError;

    private $shop_id = '249687';
    private $api_id = '25490618';
    private $api_pass = 'mlPRLQ3PJwMjAdzAHW9j';

    static public $pull_pass = '38iilDva9yO9SuZ2aQtV';

    private function getUrl($billID, $refundID = null)
    {
        $url = 'https://w.qiwi.com/api/v2/prv/' . $this->shop_id . '/bills/' . $billID;
        if ($refundID)
            $url .= '/refund/' . $refundID;

        return $url;
    }

    /**
     * @param $url
     * @param string $method
     * @param array $parameters
     * @return bool|stdClass
     */
    private function makeRequest($url, $method = 'GET', $parameters = array())
    {
        $loginPass = $this->api_id . ':' . $this->api_pass;

        $headers = array(
            "Accept: application/json",
            "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
        );

        $parameters = http_build_query($parameters);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $loginPass);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        curl_setopt($ch, CURLOPT_POST, 1);

        $httpResponse = curl_exec($ch);
        if (!$httpResponse)
            return false;

        $result = json_decode($httpResponse);
        return $result->response;
    }

    private function isResponseValid(&$response)
    {
        if (!$response)
            return false;

        if ($response->result_code != 0) {
            printf("%s!\n", $this->errorsMap[$response->result_code]);
            return false;
        }

        return true;
    }

    public function formatPhone($countryCode, $phone) {
        // чистим номер телефона от лишнего
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // правим привычный русский на международный
        if ($countryCode == '8') {
            $phone = substr($phone, 1); // срезали первый символ
            $phone = '7' . $phone; // добавили семерку
        }

        return 'tel:+' . $phone;
    }

    /**
     * @param string $phone номер телефона
     * @param int $amount сумма заказа
     * @param array $extras массив с доп. параметрами, которые будут переданы QIWI
     * @return array результат работы метода
     */
    public function createBill($phone, $amount, array $extras = array())
    {
        $matches = array();
        // проверяем номер телефона на валидность
        if (!preg_match('/^((8|\+7|\+[0-9]{1,3})[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $phone, $matches))
            return array('status' => 'error', 'info' => 'tel');

        // приводим телефон к нужному qiwi формату
        $phone = $this->formatPhone($matches[1], $phone);

        $parameters = array(
            'user' => $phone,
            'amount' => $amount,
            'account' => $extras['uid'],
            'ccy' => 'RUB',
            'comment' => 'Оплата заказа #' . $extras['oid'],
            'lifetime' => date('c', time() + 86400 * 7), // 1 week
            'pay_source' => 'qw'
        );

        $billID = $extras['oid'] . '_' . time();

        $result = $this->makeRequest($this->getUrl($billID), 'PUT', $parameters);

        if (!$this->isResponseValid($result))
            return array('status' => 'error', 'result' => $result);

        return array('status' => 'success', 'transaction' => $billID);
    }

    /**
     * @param $billID
     * @return bool|stdClass
     */
    public function getBillStatus($billID)
    {
        $result = $this->makeRequest($this->getUrl($billID));
        if (!$this->isResponseValid($result))
            return false;

        return $result->bill;
    }

    public function cancelBill($billID)
    {
        $result = $this->makeRequest($this->getUrl($billID), 'PATCH', array('status' => 'rejected'));

        if (!$this->isResponseValid($result))
            return false;

        return $result;
    }

    private function refundBill($billID, $refundID, $amount)
    {
        $result = $this->makeRequest(
            $this->getUrl($billID, $refundID),
            'PUT',
            array('amount' => $amount)
        );

        if (!$this->isResponseValid($result))
            return;

        var_dump($result);
    }

    private function getRefundBillStatus($billID, $refundID)
    {
        $result = $this->makeRequest($this->getUrl($billID, $refundID), 'GET');

        if (!$this->isResponseValid($result))
            return;

        var_dump($result);
    }

    public function DefaultAction()
    {
        $res = $this->createBill("ZT311", "+79185971888", 100, array('uid' => 1));
        var_dump($res);
    }


    public function notify()
    {

    }
}