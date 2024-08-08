// Closing the containers by clicking on the close button
function dismissMessage(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        container.style.display = 'none';
    }
}
