<!-- Lab 2: Challenge 3 -->
<!-- By: Faye Camille Buri -->

<?php
echo '<h3>Job Listings</h3>';
$listings = [
    [
        'id' => '1', 
        'job_title' => 'PHP Developer', 
        'company' => 'IBM', 
        'email' => 'john@ibm.com ', 
        'contact_no' => '09168457456', 
        'skills' => ['PHP', 'MySQL', 'JavaScript']
    ],
    [
        'id' => '2', 
        'job_title' => 'Web Designer', 
        'company' => 'AWS', 
        'email' => 'jane@aws.com  ', 
        'contact_no' => '09175597456', 
        'skills' => ['PhotoShop', 'Illustrator', 'CSS']
    ],
    [
        'id' => '3', 
        'job_title' => 'Network Admin', 
        'company' => 'CISCO', 
        'email' => 'James@cisco.com', 
        'contact_no' => '09202224575', 
        'skills' => ['Database', 'CyberSecurity', 'Networking']
    ]
  ];

array_push($listings, 
  [
    'id' => '4', 
        'job_title' => 'Graphic Artist', 
        'company' => 'ADOBE', 
        'email' => 'princess@adobe.com', 
        'contact_no' => '09208456544', 
        'skills' => ['Photoshop', 'Bootstrap', 'Flutter']
  ]);

echo '<pre>';
print_r($listings);
print_r($listings[1]['job_title'] . ' ' . $listings[1]['company'] . ' ' . $listings[1]['email'] . '<br>');
print_r($listings[2]['skills'][0] . ' and ' . $listings[2]['skills'][2]);
echo '</pre>';
?>
