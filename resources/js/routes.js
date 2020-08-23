import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)
//TEMPLATES
import App from '../views/App'
import NotFound from '../views/errors/404'

//BACKEND
import Dashboard from '../views/dashboard/Index'
import Login from '../views/auth/Login'
import Logout from '../views/auth/Logout'
// NURSE
import AddNurse from '../views/pages/Nurse/AddNurse'
import NurseRecords from '../views/pages/Nurse/NurseRecords'
//PHYSICIAN
import Physician from '../views/pages/physician/Physician'
// PATIENT
import Patient from '../views/pages/patient/Patient'
// MEDICAL PROCEDURE
import Medical_Procedure from '../views/pages/medical_procedure/Procedure'
import Procedure_Category from '../views/pages/medical_procedure/Category'
// Department
import AddDepartment from '../views/pages/Department/AddDepartment'
import DepartmentRecords from '../views/pages/Department/DepartmentRecords'
// Building
import AddBuilding from '../views/pages/Building/AddBuilding'
import BuildingRecords from '../views/pages/Building/BuildingRecords'
// ROOM
import AddRoom from '../views/pages/Room/AddRoom'
import RoomRecords from '../views/pages/Room/RoomRecords'
// SETTINGS
import Settings from '../views/pages/Settings/Settings'

export const router = new VueRouter({
    mode: 'history',
    routes: [
        //BACKEND
        {
            path: '/',
            name: 'home',
            component: Dashboard,
            meta: {
                title: 'Dashboard',
            }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                title: 'Login',
            }
        },
        {
            path: '/logout',
            name: 'logout',
            component: Logout,
            meta: {
                title: 'Login',
            }
        },
        // Nurse
        {
            path: '/nurse/add-nurse',
            name: 'addNurse',
            component: AddNurse,
            meta: {
                title: 'Add Nurse',
            }
        },
        // PHYSICIAN
        {
            path: '/physician',
            name: 'physician',
            component: Physician,
            meta: {
                title: 'Physician',
            }
        },
        {
            path: '/nurse/nurse-records',
            name: 'nurseRecords',
            component: NurseRecords,
            meta: {
                title: 'Nurse Records',
            }
        },
        // PATIENT
        {
            path: '/patient',
            name: 'patient',
            component: Patient,
            meta: {
                title: 'Patient',
            }
        },
        // MEDICAL PROCEDURE
        {
            path: '/schedule_procedure',
            name: 'medical_procedure',
            component: Medical_Procedure,
            meta: {
                title: 'Medical Procedure',
            }
        }, 
        {
            path: '/procedure_category',
            name: 'procedure_category',
            component: Procedure_Category,
            meta: {
                title: 'Procedure Category',
            }
        },
        // DEPARTMENT
        {
            path: '/department/add-department',
            name: 'addDepartment',
            component: AddDepartment,
            meta: {
                title: 'Add Department',
            }
        },
        {
            path: '/department/department-records',
            name: 'departmentRecords',
            component: DepartmentRecords,
            meta: {
                title: 'Department Records',
            }
        },
        // Buidling
        {
            path: '/building/add-building',
            name: 'addBuilding',
            component: AddBuilding,
            meta: {
                title: 'Add Building',
            }
        },
        {
            path: '/building/building-records',
            name: 'buildingRecords',
            component: BuildingRecords,
            meta: {
                title: 'Building Records',
            }
        },
        // ROOM
        {
            path: '/room/add-room',
            name: 'addRoom',
            component: AddRoom,
            meta: {
                title: 'Add Room',
            }
        },
        {
            path: '/room/room-records',
            name: 'roomRecords',
            component: RoomRecords,
            meta: {
                title: 'Room Records',
            }
        },
        // SETTINGS
        {
            path: '/profile/settings',
            name: 'profileSettings',
            component: Settings,
            meta: {
                title: 'Profile Settings',
            }
        },  
        {
            path: '/*',
            name: '404',
            component: NotFound,
            meta: {
                title: '404 Page Not Found',
            }
        },
    ],
});


export default router;