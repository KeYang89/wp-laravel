/**
 * Created by SiD on 03/06/15.
 */

$(document).ready(function(){
    $('#btn-search').click(function(e){
        e.preventDefault();
        if($('#search-keyword').val() == '')
        {
            location.href = lobbyUrl;
        }
        else
        {
            //console.log(appUrl + lobbyUrl + '/?keyword=' + encodeURI($('#search-keyword').val()));
            location.href = lobbyUrl + '?keyword=' + encodeURI($('#search-keyword').val());
        }
    });
    $('#tbl-lobby').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "order": [],
        "columnDefs": [ {
            "targets"  : 'no-sort',
            "orderable": false
        }],
        "responsive": true,
        "searching": false,
        "lengthMenu": false
    });
});