const express = require('express');
const mongoose = require('mongoose');
const videoRoutes = require('./routes/videos');
const cors = require("cors");
const { PORT } = require('./config');


const app = express();
app.use(express.json());
app.use(cors())


// MongoDB Connection
const connectDB = async () => {
    let client = await mongoose.connect(process.env.MONGO);
    console.log('MongoDB Connected');

}
connectDB()


app.use('/api/videos', videoRoutes);


app.listen(process.env.PORT, () => {
    console.log(`Server running on http://localhost:${process.env.PORT}`);
});