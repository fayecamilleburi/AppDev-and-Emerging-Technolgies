<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Search for a Job</h1>
        <form action="result.php" method="GET" class="flex space-x-2">
            <input 
                type="text" 
                name="keyword" 
                placeholder="Enter location, title, or tag..." 
                class="flex-1 border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
            <button 
                type="submit" 
                name="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition"
            >
                Go
            </button>
        </form>
    </div>
</body>
</html>
