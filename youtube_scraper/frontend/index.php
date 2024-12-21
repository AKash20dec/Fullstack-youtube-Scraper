<?php
// Fetch videos from the backend API
$apiUrl = "http://localhost:3000/api/videos"; // Replace with your backend API URL
$response = file_get_contents($apiUrl);
$videos = json_decode($response);

// Handle Fetch Trending button
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    file_get_contents("http://localhost:3000/api/videos/scrape-trending");
    header("Location: index.php"); // Refresh the page after scraping
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Trending Videos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>YouTube Trending Videos</h1>
    </header>
    <main>
        <!-- Fetch Trending Videos Button -->
        <form method="POST">
            <button type="submit">Fetch Latest Videos</button>
        </form>
        
        <!-- Video List Section -->
        <div class="video-list">
            <?php if (!empty($videos)): ?>
                <?php foreach ($videos as $video): ?>
                    <div class="video-card">
                        <a href="pages/video.php?id=<?php echo htmlspecialchars($video->videoId); ?>">
                            <img src="<?php echo htmlspecialchars($video->thumbnails[2] ?? 'default-thumbnail.jpg'); ?>" alt="Thumbnail">
                            <h2><?php echo htmlspecialchars($video->title); ?></h2>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No videos available. Click "Fetch Latest Videos" to load trending videos.</p>
            <?php endif; ?>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
</body>
</html>
