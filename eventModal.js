export class EventModal {
    constructor() {
        this.addEventButton = document.getElementById('addEventButton');
        this.modal = document.getElementById('eventModal');
        this.closeButton = document.querySelector('.close');
        
        this.addEventButton.addEventListener('click', this.openModal.bind(this));
        this.closeButton.addEventListener('click', this.closeModal.bind(this)); 
    }

    openModal() {
        this.modal.style.display = 'block';
    }

    closeModal() {
        this.modal.style.display = 'none';
    }
}