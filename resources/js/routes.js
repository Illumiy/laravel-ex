import AllShit from './components/AllShit.vue';
import CreateShit from './components/CreateShit.vue';
import EditShit from './components/EditShit.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllShit
    },
    {
        name: 'create',
        path: '/create',
        component: CreateShit
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditShit
    }
];