# YouTube Trending Videos Scraper

## Project Overview
This project is a web scraper designed to fetch trending videos from YouTube using Puppeteer, Cheerio, and Node.js. It stores the scraped video details in a MongoDB database and provides APIs to fetch and manage video data.

## Features
- Scrape trending videos from YouTube.
- Store video data in MongoDB.
- Provide paginated results for fetched videos.
- Fetch details of a specific video by its ID.

---

## Instructions to Set Up and Run the Project on a Linux Environment

### Prerequisites
Ensure the following software is installed on your Linux system:

1. **Node.js** (v14+)
   - Install Node.js:
     ```bash
     sudo apt update
     sudo apt install nodejs npm
     ```

2. **MongoDB**
   - Install MongoDB:
     ```bash
     sudo apt update
     sudo apt install -y mongodb
     sudo systemctl start mongodb
     sudo systemctl enable mongodb
     ```

3. **Git**
   - Install Git:
     ```bash
     sudo apt update
     sudo apt install git
     ```

4. **Google Chrome** (for Puppeteer)
   - Install Google Chrome:
     ```bash
     wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
     sudo apt install ./google-chrome-stable_current_amd64.deb
     ```

---

### Project Setup

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd <repository-folder>
   ```

2. **Install Dependencies**
   ```bash
   npm install
   ```

3. **Set Up Environment Variables**
   - Create a `.env` file in the project root.
   - Add the following environment variables:
     ```env
     MONGODB_URI=mongodb://localhost:27017/youtube-videos
     PORT=3000
     ```

4. **Run MongoDB** (if not already running):
   ```bash
   sudo systemctl start mongodb
   ```

5. **Run the Project**
   - Start the application:
     ```bash
     npm start
     ```
   - The server will run on `http://localhost:3000`.

---

### API Endpoints

1. **Scrape Trending Videos**
   - Endpoint: `GET /api/scrape-trending`
   - Description: Scrape and store trending YouTube videos.

2. **Fetch All Videos**
   - Endpoint: `GET /api/videos`
   - Description: Fetch all stored video data.

3. **Fetch Video Details**
   - Endpoint: `GET /api/videos/:id`
   - Description: Fetch details of a specific video by its ID.

---

### Additional Notes
- Ensure MongoDB service is running before starting the project.
- Puppeteer uses a headless Chrome instance; ensure Google Chrome is installed and accessible.
- Use Postman or any API testing tool to test the endpoints.

### The Preview of this Project


---

## Contributors
- **Akash Kumar** - Developer



