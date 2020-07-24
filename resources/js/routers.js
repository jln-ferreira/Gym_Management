import Vue from "vue";
import VueRouter from "vue-router";

// components
import Students from "./components/app/students/Students"
import Finances from "./components/app/finances/Finances"

Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        {
            path: '/students',
            component: Students,
        },
        {
            path: '/finances',
            component: Finances,
        },
    ],
});
