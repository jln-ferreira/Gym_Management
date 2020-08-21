import Vue from "vue";
import VueRouter from "vue-router";

// components
import Dashboard from "./components/app/dashboard/Dashboard"
import Students from "./components/app/students/Students"
import Profiles from "./components/app/profiles/profiles"
import Paymments from "./components/app/paymments/Paymments"

Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        {
            path: '/',
            name: 'home',
            component: Dashboard,
        },
        {
            path: '/students',
            name: 'students',
            component: Students,
        },
        {
            path: '/students/:id',
            name: 'profiles',
            component: Profiles,
        },
        {
            path: '/paymments',
            name: 'paymments',
            component: Paymments,
        },
    ],
});
