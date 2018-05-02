(function(){
    
    
    ajax('post', 'data.php', {city: 'Berlin'}, fx);

function fx(res){
    console.log(res);
}
})();
