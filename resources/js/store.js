import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)
axios.defaults.baseURL = '/api'

export const store = new Vuex.Store({
    state:{
        token: localStorage.getItem('access_token') || null,
        filter: 'all',
        userDetails: null,
        api_key: process.env.API_KEY,
        isLoaded: false,
        show: false,
    },
    getters: {
        loggedIn(state){
            return state.token !== null
        },
    },
    mutations:{
        retrieveToken(state, token){
            state.token = token
        },
        destroyToken(state){
            state.token = null
        },
        setUserDetails(state,details){
            state.userDetails = details
        },
    },
    actions: {
        loginUser(context, credentials){
            return new Promise((resolve, reject) => {
                axios.post('/login',credentials.data)
                .then(response => {
                    const token = response.data.access_token

                    localStorage.setItem('access_token',token)
                    context.commit('retrieveToken', token)
                    resolve(response)
                })
                .catch(error=>{
                    reject(error)
                })
            })
        },
        destroyToken(context){
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
            if(context.getters.loggedIn){
                return new Promise((resolve, reject) => {
                    axios.post('/logout')
                    .then(response => {
                        localStorage.removeItem('access_token')
                        context.commit('destroyToken')
                        resolve(response)
                    })
                    .catch(error=>{
                        localStorage.removeItem('access_token')
                        context.commit('destroyToken')
                        reject(error)
                    })
                }) 
            }
        },
        resetPassword(context, credentials){
            credentials.api_key = context.state.api_key
            return new Promise((resolve, reject) => {
                axios.post('/reset-password',credentials)
                .then(response => {
                    
                    resolve(response.data)
                })
                .catch(error=>{
                    //console.log(error)
                    reject(error)
                })
            })
        },
        requestResetPassword(context, credentials){
            credentials.api_key = context.state.api_key
            return new Promise((resolve, reject) => {
                axios.post('/request-reset-password',credentials)
                .then(response => {
                    resolve(response.data)
                })
                .catch(error=>{
                    //console.log(error)
                    reject(error)
                })
            })
        },

        userDetails(context, credentials){
            return axiosSend(context, credentials,'/user/profile','get')
        },
        // NURSE
        addNurseData(context, credentials){
            return axiosSend(context, credentials,'/nurse/add', 'post')
        },
        getNurseData(context, credentials){
            return axiosSend(context, credentials,'/nurse/get-data', 'get')
        },
        deleteNurse(context, credentials){
            return axiosSend(context, credentials,'/nurse/delete','post')
        },
        // DEPARTMENT
        addDepartmentData(context, credentials){
            return axiosSend(context, credentials,'/department/add', 'post')
        },
        addDepartmentDescription(context, credentials){
            return axiosSend(context, credentials,'/department/add-description', 'post')
        },
        getDepartmentData(context, credentials){
            return axiosSend(context, credentials,'/department/get-data', 'get')
        },
        deleteDepartment(context, credentials){
            return axiosSend(context, credentials,'/department/delete', 'post')
        },
        // BUILDING
        addBuildingData(context, credentials){
            return axiosSend(context, credentials,'building/add', 'post')
        },
        getBuildingData(context, credentials){
            return axiosSend(context, credentials,'building/get-data', 'get')
        },
        deleteBuilding(context, credentials){
            return axiosSend(context, credentials,'building/delete', 'post')
        },
        // ROOM
        addRoomData(context, credentials){
            return axiosSend(context, credentials,'room/add', 'post')
        },
        getRoomData(context, credentials){
            return axiosSend(context, credentials,'room/get-data', 'get')
        },
        deleteRoom(context, credentials){
            return axiosSend(context, credentials,'room/delete', 'post')
        },
        //Physician
        addPhysician(context, credentials){
            return axiosSend(context, credentials,'/physician/add','post')   
        },
        getPhysician(context, credentials){
            return axiosSend(context, credentials,'/physician/get','get')   
        },
        deletePhysician(context, credentials){
            return axiosSend(context, credentials,'/physician/delete','post')   
        },
        //Patient
        addPatient(context, credentials){
            return axiosSend(context, credentials,'/patient/add','post')   
        },
        getPatient(context, credentials){
            return axiosSend(context, credentials,'/patient/get','get')   
        },
        deletePatient(context, credentials){
            return axiosSend(context, credentials,'/patient/delete','post')   
        },
        //MP_category
        deleteMP_category(context, credentials){
            return axiosSend(context, credentials,'/procedure_category/delete','post')   
        },
        getMP_category(context, credentials){
            return axiosSend(context, credentials,'/procedure_category/get','get')   
        },
        addMP_category(context, credentials){
            return axiosSend(context, credentials,'/procedure_category/add','post')   
        },
        //schedule
        addSchedule(context, credentials){
            return axiosSend(context, credentials,'/schedule_procedure/add','post')   
        },
        getSchedule(context, credentials){
            return axiosSend(context, credentials,'/schedule_procedure/get','get')   
        },
        deleteSchedule(context, credentials){
            return axiosSend(context, credentials,'/schedule_procedure/delete','post')   
        },
    }
})

function axiosSend(context, credentials, url, action='get', toStore = false, toStoreFuction=''){
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
    return new Promise((resolve, reject) => {
        let act = '';
        if(action==='get'){
            act = axios.get(url);
        }else if(action==='post'){
            act = axios.post(url,credentials.data);
        }
        act.then(response => {
            //const details = response.data
            //console.log(details)
            if(toStore){
                context.commit(toStoreFuction, response.data)
            }
            resolve(response.data)
        })
        .catch(error=>{
            //console.log(error)
            reject(error)
        })
    })
}