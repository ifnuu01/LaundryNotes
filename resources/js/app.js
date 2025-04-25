import './bootstrap';
import '../css/app.css';
import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({ 
    duration: 1000 ,
    startEvent: 'load'
});

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        AOS.refresh();
    }, 100);
});