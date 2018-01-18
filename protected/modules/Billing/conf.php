<?

return [
    'routes' => [
        ['admin\/billing\/products(\?.*)?',                                             'Billing', 'ManageProducts'],
        ['admin\/billing\/products\/add(\?.*)?',                                        'Billing', 'AddProduct'],
        ['admin\/billing\/products\/edit\/(?P<product_id_hash>.*)',                     'Billing', 'EditProduct'],
        ['admin\/billing\/products\/stat(\?.*)?',                                       'Billing', 'StatProducts'],
        
        ['admin\/billing\/products\/types(\?.*)?',                                      'Billing', 'ManageProductsTypes'],
        ['admin\/billing\/products\/types\/add(\?.*)?',                                 'Billing', 'AddProductType'],
        ['admin\/billing\/products\/types\/edit\/(?P<product_type_id_hash>.*)',         'Billing', 'EditProductType'],
        
        ['admin\/billing\/products\/groups(\?.*)?',                                     'Billing', 'ManageProductsGroups'],
        ['admin\/billing\/products\/groups\/add(\?.*)?',                                'Billing', 'AddProductGroup'],
        ['admin\/billing\/products\/groups\/edit\/(?P<product_group_id_hash>.*)',       'Billing', 'EditProductGroup'],
        ['billing\/products\/images\/(?P<product_id>[a-zA-Z0-9\-\_]+)',                 'Billing', 'ProductImage'],
        
        ['billing\/invoices\/create(\?.*)?',                                            'Billing', 'FreeCreateInvoice'],
        ['admin\/billing\/invoices(\?.*)?',                                             'Billing', 'ManageInvoices'],
        ['admin\/billing\/invoices\/add(\?.*)?',                                        'Billing', 'AddInvoice'],
        ['admin\/billing\/invoices\/edit\/(?P<invoice_id_hash>.*)',                     'Billing', 'EditInvoice'],
        ['admin\/billing\/invoices\/details\/(?P<invoice_id_hash>.*)',                  'Billing', 'InvoiceDetails'],
        ['admin\/billing\/invoices\/import(\?.*)?',                                     'Billing', 'ImportInvoices'],
        ['admin\/billing\/invoices\/diff(\?.*)?',                                       'Billing', 'DiffInvoices'],
        ['admin\/billing\/invoices\/diff\/import(\?.*)?',                               'Billing', 'DiffImportInvoices'],

        ['admin\/billing\/payments(\?.*)?',                                             'Billing', 'ManagePayments'],
        ['admin\/billing\/payments\/details\/(?P<payment_id_hash>[a-zA-Z0-9\-\_]+)(\?.*)?', 'Billing', 'PaymentDetails'],
        ['billing\/payments\/make\/(?P<invoice_id_hash>[a-zA-Z0-9\-\_]+)(\?.*)?',       'Billing', 'PaymentMake'],
        ['billing\/payments\/success\/(?P<invoice_id_hash>[a-zA-Z0-9\-\_]+)(\?.*)?',    'Billing', 'PaymentSuccess'],
        ['billing\/payments\/fail\/(?P<invoice_id_hash>[a-zA-Z0-9\-\_]+)(\?.*)?',       'Billing', 'PaymentFail'],
        ['billing\/payments\/operators\/(?P<operator_id>[a-z0-9\-]+)\/(?P<method_id>[a-z0-9\-]+)(\?.*)?',   'Billing', 'PaymentOperator'],
        ['billing\/payments\/thnx\/(?P<user_email_hash>.*)',                            'Billing', 'ThnxPayment'],
        
        ['admin\/billing\/settings(\?.*)?',                                             'Billing', 'Settings'],
        ['admin\/billing\/sales(\?.*)?',                                                'Billing', 'Sales'],
        ['admin\/billing\/products(\?.*)?',                                             'Billing', 'ManageProducts'],

        // API
        ['admin\/billing\/api\/dashboard\.json(\?.*)?',                                 'Billing', 'APIDashboard'],
        
        ['billing\/products\/api\/search\.json(\?.*)?',                                 'Billing', 'APISearchProducts'],
        ['admin\/billing\/products\/api\/action\.json(\?.*)?',                          'Billing', 'APISearchProductsAction'],
        ['admin\/billing\/products\/api\/add\.json(\?.*)?',                             'Billing', 'APIAddProduct'],
        ['admin\/billing\/products\/api\/update\.json(\?.*)?',                          'Billing', 'APIUpdateProduct'],
        ['admin\/billing\/products\/api\/remove\.json(\?.*)?',                          'Billing', 'APIRemoveProduct'],
        ['billing\/products\/api\/suggest\.json(\?.*)?',                                'Billing', 'APIUserSuggestProducts'],
        
        ['billing\/products\/types\/api\/search\.json(\?.*)?',                          'Billing', 'APISearchProductsTypes'],
        ['admin\/billing\/products\/types\/api\/action\.json(\?.*)?',                   'Billing', 'APISearchProductsTypesAction'],
        ['admin\/billing\/products\/types\/api\/add\.json(\?.*)?',                      'Billing', 'APIAddProductType'],
        ['admin\/billing\/products\/types\/api\/update\.json(\?.*)?',                   'Billing', 'APIUpdateProductType'],
        ['admin\/billing\/products\/types\/api\/remove\.json(\?.*)?',                   'Billing', 'APIRemoveProductType'],
        
        ['admin\/billing\/products\/groups\/api\/search\.json(\?.*)?',                  'Billing', 'APISearchProductsGroups'],
        ['admin\/billing\/products\/groups\/api\/action\.json(\?.*)?',                  'Billing', 'APISearchProductsGroupsAction'],
        ['admin\/billing\/products\/groups\/api\/add\.json(\?.*)?',                     'Billing', 'APIAddProductGroup'],
        ['admin\/billing\/products\/groups\/api\/update\.json(\?.*)?',                  'Billing', 'APIUpdateProductGroup'],
        ['admin\/billing\/products\/groups\/api\/remove\.json(\?.*)?',                  'Billing', 'APIRemoveProductGroup'],
        
        ['billing\/invoices\/api\/add\.json(\?.*)?',                                    'Billing', 'APIAddInvoice'],
        ['admin\/billing\/invoices\/api\/search\.json(\?.*)?',                          'Billing', 'APISearchInvoices'],
        ['admin\/billing\/invoices\/api\/action\.json(\?.*)?',                          'Billing', 'APISearchInvoicesAction'],
        ['admin\/billing\/invoices\/api\/update\.json(\?.*)?',                          'Billing', 'APIUpdateInvoice'],
        ['admin\/billing\/invoices\/api\/remove\.json(\?.*)?',                          'Billing', 'APIRemoveInvoice'],
        ['admin\/billing\/invoices\/api\/revoke\.json(\?.*)?',                          'Billing', 'APIRevokeInvoice'],
        ['admin\/billing\/invoices\/api\/pay\.json(\?.*)?',                             'Billing', 'APIPayInvoice'],
        
        ['billing\/admin\/invoices\/api\/details\.json(\?.*)?',                         'Billing', 'APIInvoiceDetails'],
        ['billing\/invoices\/api\/details\/update\.json(\?.*)?',                        'Billing', 'APIUpdateInvoicesDetails'],
        
        ['admin\/billing\/invoices\/labels\/api\/update\.json(\?.*)?',                  'Billing', 'APIUpdateInvoiceLabels'],
        
        ['admin\/billing\/invoices\/comments\/api\/add\.json(\?.*)?',                   'Billing', 'APIInvoiceAddComment'],
        
        ['admin\/billing\/payments\/api\/search\.json(\?.*)?',                          'Billing', 'APISearchPayments'],
        ['admin\/billing\/payments\/api\/action\.json(\?.*)?',                          'Billing', 'APISearchPaymentsAction'],
        
        ['admin\/billing\/api\/settings\/update\.json(\?.*)?',                          'Billing', 'APIUpdateSettings'],
        
        ['billing\/api\/eautopay\/invoice\.json(\?.*)?',                                'Billing', 'APIEAutopayCreateInvoice']
    ],
    'currency_code' => [
        'UAH' => 'грн.',
        'USD' => '$',
        'EUR' => '€'
    ],
    'currency_plus' => 0.03,
];
