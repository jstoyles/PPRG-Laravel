$('#reset').on('click', function(){
    $('#repos').html($('#loader').html());
    $.get('/reset-repos?results=true').done(function(data){
        var repos = JSON.parse(data);
        var markup = '';
        $.each(repos, function(){
            markup += '<section>';
            markup += '<a href="/repo-details/' + this.id + '/" class="repo-link">' + this.github_name + '</a>';
            markup += '<details>';
            markup += '<summary>Description</summary>';
            markup += '<p>' + this.github_description + '</p>';
            markup += '</details>';
            markup += '</section>';
        });
        $('#repos').html(markup);
    });
});