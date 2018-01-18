<?
return [
    'routes' => [

        // Гардероб на 100% Line (основной)
        ['products\/garderob100\/form(\?.*)?',                              'Pages', 'ProductGarderob100Form'],
        ['products\/garderob100\/activate(\?.*)?',                          'Pages', 'ProductGarderob100Activate'],
        ['products\/garderob100\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',         'Pages', 'ProductGarderob100Sale'],

        
        // Шоппинг осень-зима под контролем стилиста
        ['products\/shopping\-fw\/form(\?.*)?',                             'Pages', 'ProductShoppingFWForm'],
        ['products\/shopping\-fw\/activate(\?.*)?',                         'Pages', 'ProductShoppingFWActivate'],
        ['products\/shopping\-fw\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',        'Pages', 'ProductShoppingFWSale'],

        
        // Шоппинг весна-лето под контролем стилиста
        ['products\/shopping\-ss\/form(\?.*)?',                             'Pages', 'ProductShoppingSSForm'],
        ['products\/shopping\-ss\/activate(\?.*)?',                         'Pages', 'ProductShoppingSSActivate'],
        ['products\/shopping\-ss\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',        'Pages', 'ProductShoppingSSSale'],
        
        
        // Икона стиля
        ['products\/icon\/preentry\/form(\?.*)?',                           'Pages', 'ProductIconPreentryForm'],
        ['products\/icon\/preentry\/success(\?.*)?',                        'Pages', 'ProductIconPreentrySuccess'],
        ['products\/icon\/notification\/form(\?.*)?',                       'Pages', 'ProductIconNotificationForm'],
        ['products\/icon\/notification\/success(\?.*)?',                    'Pages', 'ProductIconNotificationSuccess'],
        ['products\/icon\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',                'Pages', 'ProductIconSale'],
        
        
        // Как выглядеть на 2 размера стройнее с помощью имиджмейкера (основной)
        ['products\/2razmera\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',            'Pages', 'Product2razmeraSale'],
        
        
        // 1000 интернет клиентов для имиджмейкера (основной)
        ['products\/1000clients\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',         'Pages', 'Product1000clientsSale'],
        
        
        // Портфолио для имиджмейкера за 1 месяц (основной)
        ['products\/portfolio\/form(\?.*)?',                                'Pages', 'ProductPortfolioForm'],
        ['products\/portfolio\/activate(\?.*)?',                            'Pages', 'ProductPortfolioActivate'],
        ['products\/portfolio\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',           'Pages', 'ProductPortfolioSale'],
        
        
        // 5 секретов преображения Вашего гардероба
        ['products\/5secrets\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',            'Pages', 'Product5secretsSale'],
        
        
        // Революция Цвета
        ['products\/bigcolor\/form(\?.*)?',                                 'Pages', 'ProductBigColorForm'],
        ['products\/bigcolor\/activate(\?.*)?',                             'Pages', 'ProductBigColorActivate'],
        ['products\/bigcolor\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',            'Pages', 'ProductBigColorSale'],
        
        
        // Верхняя одежда под контролем стилиста
        ['products\/outerwear\/form(\?.*)?',                                'Pages', 'ProductOuterwearForm'],
        ['products\/outerwear\/activate(\?.*)?',                            'Pages', 'ProductOuterwearActivate'],
        ['products\/outerwear\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',           'Pages', 'ProductOuterwearSale'],
        
        
        // Головные уборы под контролем стилиста
        ['products\/headwear\/form(\?.*)?',                                 'Pages', 'ProductHeadwearForm'],
        ['products\/headwear\/activate(\?.*)?',                             'Pages', 'ProductHeadwearActivate'],
        ['products\/headwear\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',            'Pages', 'ProductHeadwearSale'],

        
        // MakeUp Must Have
        ['products\/makeup\/form(\?.*)?',                                   'Pages', 'ProductMakeupForm'],
        ['products\/makeup\/activate(\?.*)?',                               'Pages', 'ProductMakeupActivate'],
        ['products\/makeup\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',              'Pages', 'ProductMakeupSale'],

        
        // 101 рецепт стильного гардероба в офис
        ['products\/101office\/form(\?.*)?',                                'Pages', 'Product101OfficeForm'],
        ['products\/101office\/activate(\?.*)?',                            'Pages', 'Product101OfficeActivate'],
        ['products\/101office\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',           'Pages', 'Product101OfficeSale'],
        
        
        // Школа Имиджмейкеров - 2 - новый поток
        ['products\/imageschool\-new\/preentry\/form(\?.*)?',               'Pages', 'ProductImageschoolNewPreentryForm'],
        ['products\/imageschool\-new\/preentry\/success(\?.*)?',            'Pages', 'ProductImageschoolNewPreentrySuccess'],
        ['products\/imageschool\-new\/notification\/form(\?.*)?',           'Pages', 'ProductImageschoolNewNotificationForm'],
        ['products\/imageschool\-new\/notification\/success(\?.*)?',        'Pages', 'ProductImageschoolNewNotificationSuccess'],
        ['products\/imageschool\-new\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',    'Pages', 'ProductImageschoolNewSale'],
        
        
        // Гардероб на 100% - Line - 2 - новый поток
        ['products\/garderob100new\/preentry\/form(\?.*)?',                 'Pages', 'ProductGarderob100NewPreentryForm'],
        ['products\/garderob100new\/preentry\/success(\?.*)?',              'Pages', 'ProductGarderob100NewPreentrySuccess'],
        ['products\/garderob100new\/notification\/form(\?.*)?',             'Pages', 'ProductGarderob100NewNotificationForm'],
        ['products\/garderob100new\/notification\/success(\?.*)?',          'Pages', 'ProductGarderob100NewNotificationSuccess'],
        ['products\/garderob100new\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',      'Pages', 'ProductGarderob100NewSale'],
        
        
        // Революция Цвета v2 (викторина)
        ['products\/bigcolor2\/form(\?.*)?',                                'Pages', 'ProductBigColor2Form'],
        ['products\/bigcolor2\/activate(\?.*)?',                            'Pages', 'ProductBigColor2Activate'],
        ['products\/bigcolor2\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',           'Pages', 'ProductBigColor2Sale'],
        
        
        // Школа Имиджмейкеров (основной)
        // Школа Имиджмейкеров (основной) v2
        ['products\/imageschool\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',         'Pages', 'ProductImageSchoolSale'],
        
        
/// Временно не нужен //////////////////////////////////////////////////////////

        
        // [DEV] Новый год для вашего гардероба
        ['products\/nygarderob\/poll\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',    'Pages', 'ProductNYGarderobPoll'],
        ['products\/nygarderob\/sale\/(?P<token>[a-zA-Z0-9-_]+)(\?.*)?',    'Pages', 'ProductNYGarderobSale'],
        
    ]
];