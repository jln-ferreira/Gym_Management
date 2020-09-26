import Vue from "vue";
import VueRouter from "vue-router";

// components
import Dashboard from "./components/app/dashboard/Dashboard"

// [menu]
//students
import Students from "./components/app/students/Students"
import Profiles from "./components/app/profiles/profiles"

import Paymments from "./components/app/paymments/Paymments"
import Costs from "./components/app/costs/Costs"

//settings
import Settings from "./components/app/settings/Settings"

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
        {
            path: '/costs',
            name: 'costs',
            component: Costs,
        },
        {
            path: '/settings',
            name: 'settings',
            component: Settings,
        },
    ],
});
