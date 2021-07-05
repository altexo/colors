import store from '~/store'

export default (to, from, next) => {
  if (!store.getters['auth/check']) {
   
    next({ name: 'login' })
  } else {
    if ( store.getters['auth/role'] === 1){
      next()
    }

  }
}
