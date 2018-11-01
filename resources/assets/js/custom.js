
var jQuery;
jQuery.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
  }
});



jQuery('document').ready(function () {
    /* Validation */

    jQuery("#bannerForm").validate({
        rules: {
            heading: {
                required: true,
            },
            heading: {
                required: true,
            },
            started_url: {
                required: true,
            },
            project_url: {
                required: true,
            },
        },
        submitHandler: submitBannerForm
    });
    function submitBannerForm() {
        var data = jQuery("#bannerForm").serialize();
        jQuery.ajax({
            type:'POST',
            url:'/demoproject/adminBanners/store',
            data:data,
            success:function(response){
            alert(response);
            window.location.href = response;
            }
        });
        return false;
    }
});

// Common Genric Function
function genericStatus(strID, tableName)
{
     if(confirm('Are you sure you want to change status'))
     {
         jQuery.ajax({
            type:'GET',
            url:'/demoproject/genric/status',
            data: {id: strID, table: tableName},
            success:function(data){
            jQuery('#bootstrap-data-table').DataTable().ajax.reload();
            //jQuery("#category-row-"+strID).remove();
            }
        });
    } 
}