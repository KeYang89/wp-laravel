<script src="http://matchday45.com/team/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>

    $(document).ready(function(){
        console.log('running');
        $.getJSON('http://matchday45.com/team/api/v1/getUserTeam/6', function(data){
            console.log('success');
        });
    });

</script>