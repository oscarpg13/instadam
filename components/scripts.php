<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    function savePost(event, element){
        event.preventDefault()
        console.log({event, element})
        const id = event.srcElement.elements.id.value
        const formData = new FormData();
        formData.append("id", id)
        formData.append("guardarFoto", true)
        console.log({event,element,id})
        fetch("",{
            method:"POST",
            body: formData
        })
        element.lastElementChild.lastElementChild.classList.toggle("text-danger")
    }

</script>