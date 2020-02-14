import Home from './pages/Home'
import Register from './auth/Register'
import Login from './auth/Login'

export default [ 
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '/register',
        component: Register,
        name: 'register'
    },
    {
        path: '/login',
        component: Login,
        name: 'login'
    }
]