var express = require('express');

var path = require('path');

var bodyParser = require("body-parser");



//connect to the mongoDB

var db = require('mongoskin').db("mongodb://localhost/testdb", { w: 0});

    db.bind('event');



//create express app, use public folder for static files

var app = express();

app.use(express.static(path.join(__dirname, 'public')));



//is necessary for parsing POST request

app.use(bodyParser.json());

app.use(bodyParser.urlencoded({ extended: true }));



app.listen(3100);


app.get('/init', function(req, res){
    db.event.insert({
        text:"Dr. Nguyen cancelled class",
        start_date: new Date(2020,2,14),
        end_date:   new Date(2020,2,14)
    });
    db.event.insert({
        text:"Max's test event",
        start_date: new Date(2020,2,4),
        end_date:   new Date(2020,2,4),
        color: "#DD8616"
    });

    /*... skipping similar code for other test events...*/

    res.send("Test events were added to the database")
});


app.get('/data', function(req, res){
    db.event.find().toArray(function(err, data){
        //set id property for all records
        for (var i = 0; i < data.length; i++)
            data[i].id = data[i]._id;

        //output response
        res.send(data);
    });
});


app.post('/data', function(req, res){
    var data = req.body;

    //get operation type
    var mode = data["!nativeeditor_status"];
    //get id of record
    var sid = data.id;
    var tid = sid;

    //remove properties which we do not want to save in DB
    delete data.id;
    delete data["!nativeeditor_status"];


    //output confirmation response
    function update_response(err, result){
        if (err)
            mode = "error";
        else if (mode == "inserted")
            tid = data._id;

        res.setHeader("Content-Type","application/json");
        res.send({action: mode, sid: sid, tid: tid});

    }

    //run db operation
    if (mode == "updated")
        db.event.updateById( sid, data, update_response);
    else if (mode == "inserted")
        db.event.insert(data, update_response);
    else if (mode == "deleted")
        db.event.removeById( sid, update_response);
    else
        res.send("Not supported operation");
});
