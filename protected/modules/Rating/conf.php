<?
return [
    'routes' => [
        ['admin\/rating(\?.*)?',                                                'Rating', 'ManageRating'],
        ['rating\/(?P<item>[a-z0-9\-]+)\/(?P<rating>1|2|3|4|5)\/(?P<id>.*)',    'Rating', 'SetRating'],
        
        ['admin\/rating\/api\/search\.json(\?.*)?',                             'Rating', 'APISearchRating'],
        ['admin\/rating\/api\/action\.json(\?.*)?',                             'Rating', 'APIRatingAction'],
        
        ['rating\/comments\/post\.json',                                        'Rating', 'PostComment']
    ]
];