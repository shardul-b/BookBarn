// npm run dev
//Part1: Express Web Server
var express = require('express');
 const bodyParser = require("body-parser");
const hostname='localhost';
var app = express();
app.use(bodyParser.json());
var port = 3000;
app.listen(port,()=>{
    console.log(`Server running at http://${hostname}:${port}`);
});
var spawn = require('child_process').spawn;

// Content Based Recommendation
app.post('/books',(req, res)=>{
    //console.log(req.body.title)
    var process = spawn('python3',['goodbooks-content-based-book-recommendation.py',req.body.title]);
    // console.log(process)
    process.stdout.on('data', function (data) {
        // console.log(data.toString())
        res.json(data.toString());
    });
});
//Random Books for rating
app.get('/random_books',(req,res)=>{
    
    var process = spawn('python3',['Random_Books.py']);
    process.stdout.on('data', function (data) {
        res.json(data.toString());
    });
});

/*
    {
        'user_id':user_id,
        'book_id':book['book_id'].values[0],
        'rating':rating
    }

    Post request format:
    {    
        "values":[{
            "user_id":1,
            "book_id":123,
            "rating":5
        },
        {
            "user_id":1,
            "book_id":234,
            "rating":3
        }]
    }
    [{"user_id": 847, "book_id": 33, "rating": 1}, {"user_id": 847, "book_id": 91, "rating": '3'}, {'user_id': 847, 'book_id': 64, 'rating': '4'}]
*/
// Collaborative Filtering
app.post('/books-collab',(req,res)=>{
    console.log(JSON.stringify(req.body.ratings))
    let process = spawn('python3',["Collaborative-Filtering-KNN.py",JSON.stringify(req.body.ratings),req.body.user_id])
    // console.log(process)
    process.stdout.on('data', function (data) {
        // console.log()
        console.log(data.toString());
        res.json(data.toString().split('$')[1]);
    });
    process.stderr.on('error',function(error){
        console.log(error);
    })
});
// '[{"user_id": 847, "book_id": 33, "rating": 1}, {"user_id": 847, "book_id": 91, "rating": 3}, {"user_id": 847, "book_id": 64, "rating": 4}]' 847

