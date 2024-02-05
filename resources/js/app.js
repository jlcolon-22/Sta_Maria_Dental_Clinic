import './bootstrap';

import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'
import swal from 'sweetalert2';
window.Swal = swal;

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import flatpickr from "flatpickr";

window.flatpickr = flatpickr;
window.Calendar = Calendar;
window.dayGridPlugin = dayGridPlugin;
window.timeGridPlugin = timeGridPlugin;
window.listPlugin = listPlugin;
window.interactionPlugin = interactionPlugin;
Alpine.plugin(intersect)
