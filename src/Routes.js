/*-----=====|| {( START: ALL IMPORT THE PAGE NAME )} ||=====-----*/

import { createWebHistory, createRouter } from "vue-router";

import Home from './components/Home.vue'
import About from './components/About.vue'
import Resume from './components/Resume.vue'
import portfolio from './components/Portfolio.vue'
import Blog from './components/Blog.vue'
import Contact from './components/Contact.vue'
import PageNotFound from './components/PageNotFound.vue'

/*-----=====|| {( END: ALL IMPORT THE PAGE NAME )} ||=====-----*/

/*-----=====|| {( START: ALL THE NAVEBAR ROUTES )} ||=====-----*/

const routes = [
    {
      name: 'Home',
      path: '/',
      component: Home
    },
    {
      name: 'About',
      path: '/About',
      component: About

    },
    {
      name: 'Resume',
      path: '/Resume',
      component: Resume

    },
    {
      name: 'portfolio',
      path: '/portfolio',
      component: portfolio
    },
    {
      name: 'Blog',
      path: '/Blog',
      component: Blog
    },
    {
      name: 'Contact',
      path: '/Contact',
      component: Contact
    },
    {
      name: 'PageNotFound',
      path: '/:PageNotFound',
      component: PageNotFound
    }
];
  
const router = createRouter ({
    history: createWebHistory(),
    routes
});
  
export default router;

/*-----=====|| {( END: ALL THE NAVEBAR ROUTES )} ||=====-----*/
