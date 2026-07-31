import Swal from "sweetalert2";

const createSuccess = document.getElementById('success-create-notif');
if(createSuccess){
    Swal.fire({
        title:"Created success!",
        text:"Data created successfully",
        icon:"success"
    })
}

const updateSuccess = document.getElementById('success-update-notif');
if(updateSuccess){
    Swal.fire({
        title:"Updated success!",
        text:"Data updated successfully",
        icon:"success"
    })
}
const deleteSuccess = document.getElementById('success-delete-notif');
if(deleteSuccess){
    Swal.fire({
        title:"Deleted success!",
        text:"Data deleted successfully",
        icon:"success"
    })
}

const importSuccess = document.getElementById('success-import-notif');
if(importSuccess){
    Swal.fire({
        title:"Import success!",
        text:"Data imported successfully",
        icon:"success"
    })
}

const importFailed = document.getElementById('error-import-notif');
if(importFailed){
    Swal.fire({
        title:"Import failed!",
        text:"Data failed to import",
        icon:"error"
    })
}


const deleteForm = document.querySelectorAll('.delete-form').forEach((form)=>{
    form.addEventListener('submit',function(e){
        e.preventDefault()
        Swal.fire({
            title:"Delete data?",
            text:"This action cannot be undone",
            icon:"warning",
            showCancelButton:true,
            confirmButtonText:"Delete",
            cancelButtonText:"Cancel"
        }).then((result)=>{
            if(result.isConfirmed){
                form.submit();
            }
        })
    })
})
