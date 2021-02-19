export default function requests() {

    let requestStatus = () => {
        let items = document.getElementsByClassName('request_status')
        items = [].slice.call(items)
        // console.log(items)

        items.map(item => {
            let status = item.dataset.status
    
            if(status == 'disaccepted') {
                item.classList.add("warning")
                item.children[5].innerHTML = '<span class="badge badge-danger">Заявка не принята!</span>'
                item.children[7].innerHTML = '<span class="badge badge-danger">Не принята</span>'
            } else if(status == 'new') {
                item.children[7].innerHTML = '<span class="badge badge-success">Новая</span>'
            } else if(status == 'inwork') {
                item.children[7].innerHTML = '<span class="badge badge-warning">В работе</span>'
            } else if(status == 'archive') {
                item.children[7].innerHTML = '<span class="badge badge-secondary">Архивная</span>'
            }
        })
    }
    requestStatus()

    let singleRequestPage = () => {
        const sidebar = document.getElementById('sidebar')
        let path = window.location.pathname
        console.log(path.match('request'))
        if(path.match('request')[0] == 'request') {
            // sidebar.style.display = "none"
        }
    }
    // singleRequestPage()

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // console.log(e.target.result)
                // // $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                // $('#imagePreview').hide();
                // $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#fileUpload").change(function() {
        readURL(this);
    });

    

   function validateFile() {
        let fileOutput = document.getElementById('fileOutput')

        // const allowedExtensions =  ['jpg','png','svg'],
        const allowedExtensions =  [],
            sizeLimit = 10000000; 
            let files = [].slice.call(this.files)

        const { name:fileName, size:fileSize } = this.files[0];

        const fileExtension = fileName.split(".").pop();

        if(!allowedExtensions.includes(fileExtension)){
            let filesList = files.map(file => {
                const fileType = file.name.split(".").pop();
               return '<div><span class="badge mr-1 badge-danger">' + fileType + '</span><span id="fileNameOutput">' + file.name + '</span></div>'
            })

            fileOutput.innerHTML = filesList.join(' ')
            
        } else if(fileSize > sizeLimit){
            // this.value = null;
        }
    }
    document.getElementById("fileUpload").addEventListener("change", validateFile)

}