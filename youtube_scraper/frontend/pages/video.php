<?php
// Get the video ID from the query parameter
$videoId = $_GET['id'] ?? null;

if (!$videoId) {
    echo "Video ID is missing.";
    exit;
}

$apiUrl = "http://localhost:3000/api/videos/$videoId";

$response = file_get_contents($apiUrl);

if ($response === false) {
    echo "Error fetching video data.";
    exit;
}

$video = json_decode($response);

if ($video === null) {
    echo "Video not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($video->title ?? 'Video'); ?></title>
    <link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body>
    <header>
        <a href="../index.php" class="home-button">Home</a>
        <h1><?php echo htmlspecialchars($video->title ?? 'No Title Available'); ?></h1>
    </header>
    <main>
        <div class="video-player">
            <iframe 
                src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video->videoId); ?>?autoplay=1" 
                frameborder="0" 
                allow="autoplay; encrypted-media" 
                allowfullscreen>
            </iframe>
        </div>
        <div class="video-details">
            <h2><?php echo htmlspecialchars($video->title ?? 'No Title Available'); ?></h2>
            <p class="description"><?php echo htmlspecialchars($video->description ?? 'No description available'); ?></p>
            <div class="buttons">
                <button id="likeButton" onclick="toggleLike()">👍 Like</button>
                <button id="dislikeButton" onclick="toggleDislike()">👎 Dislike</button>
            </div>
            <div class="channel-info">
                <img src="<?php echo htmlspecialchars($video->thumbnails[2] ?? 'default-thumbnail.jpg'); ?>" alt="Channel Thumbnail">
                <div>
                    <h3><?php echo htmlspecialchars($video->channelTitle ?? 'No Channel Title'); ?></h3>
                    <p><?php echo htmlspecialchars($video->channelDescription ?? 'No channel description'); ?></p>
                    <p class="subscriber-count"><?php echo htmlspecialchars($video->channelSubscribers ?? 'N/A'); ?> Subscribers</p>
                </div>
            </div>
            <div class="views-likes">
                <p class="views">Views: <?php echo htmlspecialchars($video->viewCount ?? 'N/A'); ?>k</p>
                <p class="likes">Likes: <?php echo htmlspecialchars($video->likeCount ?? '0'); ?>k</p>
            </div>
        </div>
    </main>
    <script>
        let isLiked = false;
        let isDisliked = false;

        function toggleLike() {
            const likeButton = document.getElementById('likeButton');
            const dislikeButton = document.getElementById('dislikeButton');
            if (!isLiked) {
                likeButton.textContent = "👍 Liked";
                dislikeButton.textContent = "👎 Dislike";
                isLiked = true;
                isDisliked = false;
            } else {
                likeButton.textContent = "👍 Like";
                isLiked = false;
            }
        }

        function toggleDislike() {
            const likeButton = document.getElementById('likeButton');
            const dislikeButton = document.getElementById('dislikeButton');
            if (!isDisliked) {
                dislikeButton.textContent = "👎 Disliked";
                likeButton.textContent = "👍 Like";
                isDisliked = true;
                isLiked = false;
            } else {
                dislikeButton.textContent = "👎 Dislike";
                isDisliked = false;
            }
        }
    </script>
</body>
</html>
