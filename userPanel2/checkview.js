function pageViews(){
    var count=0;
    var rfe=firebase.database().ref("pageview");
    rfe.on('value', function(snapshot){
        if(count>1)
        return;

        var pageview=snapshot.val();
        rfe.set(pageview+1);
        counter++;
    }); 
}