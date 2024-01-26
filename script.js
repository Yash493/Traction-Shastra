const dragArea = document.getElementById('dragArea');
const fileInput = document.getElementById('file');
const browseBtn = document.getElementById('browseBtn');

dragArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dragArea.classList.add('active');
});

dragArea.addEventListener('dragleave', () => {
    dragArea.classList.remove('active');
});

dragArea.addEventListener('drop', (e) => {
    e.preventDefault();
    dragArea.classList.remove('active');
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        handleFiles(files);
    }
});

browseBtn.addEventListener('click', () => {
    fileInput.click();
});

fileInput.addEventListener('change', () => {
    const files = fileInput.files;
    handleFiles(files);
});

function handleFiles(files) {
    const file = files[0];
    if (file) {
        console.log('Handle Files function executed'); // Add this line for debugging

        // Use the Fetch API to send the file to the server
        const formData = new FormData();
        formData.append('file', file);

        fetch('upload.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Display the server response (you can customize this part)
            alert("File uploaded successfully");
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}
