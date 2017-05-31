import Vue from 'vue';
import Router from 'vue-router';
import Login from '@/components/Login';
import User from '@/components/User';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login,
    },
    {
      path: '/user/:userId/',
      name: 'User',
      component: User,
      props: true,
    },
    {
      path: '/profile/:userId/',
      name: 'Profile',
      component: User,
      meta: { requiresAuth: true },
      props: true,
    },
  ],
});
