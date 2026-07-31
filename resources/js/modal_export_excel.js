const modal = document.getElementById('importModal');
const btnImport = document.getElementById('btnImport');
const btnCloseImport = document.getElementById('btnCloseImport');


btnImport.addEventListener("click",()=>{
    modal.classList.remove('hidden')
});

btnCloseImport.addEventListener("click",()=>{
    modal.classList.add('hidden');
});


