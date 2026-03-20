<?php
$listings = [
    [
        'id' => 1,
        'title' => 'Software Engineer',
        'description' => 'We are seeking a skilled software engineer to develop high-quality software solutions.',
        'salary' => 80000,
        'location' => 'San Francisco',
        'tags' => ['Software Development', 'Java', 'Python']
    ],
    [
        'id' => 2,
        'title' => 'Marketing Specialist',
        'description' => 'We are looking for a marketing specialist to develop and implement effective marketing strategies.',
        'salary' => 60000,
        'location' => 'New York',
        'tags' => ['Digital Marketing', 'Social Media', 'SEO']
    ],
    [
        'id' => 3,
        'title' => 'Accountant',
        'description' => 'We are hiring an experienced accountant to handle financial transactions and ensure compliance.',
        'salary' => 55000,
        'location' => 'Chicago',
        'tags' => ['Accounting', 'Bookkeeping', 'Financial Reporting']
    ],
    [
        'id' => 4,
        'title' => 'UX Designer',
        'description' => 'We are seeking a talented UX designer to create intuitive and visually appealing user interfaces.',
        'salary' => 70000,
        'location' => 'Seattle',
        'tags' => ['User Experience', 'Wireframing', 'Prototyping']
    ],
    [
        'id' => 5,
        'title' => 'Customer Service Representative',
        'description' => 'We are looking for a friendly customer service representative to assist customers and resolve issues.',
        'salary' => 40000,
        'location' => 'New York',
        'tags' => ['Customer Support', 'Communication', 'Problem Solving']
    ],
];

$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : "";

function matchesKeyword($listing, $keyword) {
    $keyword = strtolower($keyword);
    return (
        stripos($listing['title'], $keyword) !== false ||
        stripos($listing['description'], $keyword) !== false ||
        stripos($listing['location'], $keyword) !== false ||
        array_filter($listing['tags'], fn($tag) => stripos($tag, $keyword) !== false)
    );
}

$matched = [];
$unmatched = [];

foreach ($listings as $listing) {
    if (!empty($keyword) && matchesKeyword($listing, $keyword)) {
        $matched[] = $listing;
    } else {
        $unmatched[] = $listing;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-6">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">Job Listings</h1>
            <?php if (!empty($keyword)): ?>
                <p class="mt-2 text-lg">Showing results for "<strong><?= htmlspecialchars($keyword); ?></strong>"</p>
            <?php endif; ?>
        </div>
    </header>

    <main class="container mx-auto p-6">
        <?php if (!empty($keyword) && count($matched) > 0): ?>
            <h2 class="text-xl font-semibold mb-4">Matching Results</h2>
            <?php foreach ($matched as $job): ?>
                <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                    <h2 class="text-2xl font-semibold text-blue-600"><?= htmlspecialchars($job['title']); ?></h2>
                    <p class="text-gray-700 mt-2"><?= htmlspecialchars($job['description']); ?></p>
                    <ul class="mt-4 space-y-1 text-sm text-gray-600">
                        <li><strong>Salary:</strong> $<?= number_format($job['salary']); ?></li>
                        <li><strong>Location:</strong> <?= htmlspecialchars($job['location']); ?></li>
                        <li><strong>Tags:</strong> <?= implode(', ', array_map('htmlspecialchars', $job['tags'])); ?></li>
                    </ul>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!empty($keyword) && count($unmatched) > 0): ?>
            <h2 class="text-xl font-semibold mt-8 mb-4 text-gray-500">Other Listings</h2>
        <?php endif; ?>

        <?php foreach ($unmatched as $job): ?>
            <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                <h2 class="text-2xl font-semibold text-blue-600"><?= htmlspecialchars($job['title']); ?></h2>
                <p class="text-gray-700 mt-2"><?= htmlspecialchars($job['description']); ?></p>
                <ul class="mt-4 space-y-1 text-sm text-gray-600">
                    <li><strong>Salary:</strong> $<?= number_format($job['salary']); ?></li>
                    <li><strong>Location:</strong> <?= htmlspecialchars($job['location']); ?></li>
                    <li><strong>Tags:</strong> <?= implode(', ', array_map('htmlspecialchars', $job['tags'])); ?></li>
                </ul>
            </div>
        <?php endforeach; ?>

        <?php if (empty($keyword)): ?>
            <?php foreach ($listings as $job): ?>
                <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                    <h2 class="text-2xl font-semibold text-blue-600"><?= htmlspecialchars($job['title']); ?></h2>
                    <p class="text-gray-700 mt-2"><?= htmlspecialchars($job['description']); ?></p>
                    <ul class="mt-4 space-y-1 text-sm text-gray-600">
                        <li><strong>Salary:</strong> $<?= number_format($job['salary']); ?></li>
                        <li><strong>Location:</strong> <?= htmlspecialchars($job['location']); ?></li>
                        <li><strong>Tags:</strong> <?= implode(', ', array_map('htmlspecialchars', $job['tags'])); ?></li>
                    </ul>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
</body>
</html>
