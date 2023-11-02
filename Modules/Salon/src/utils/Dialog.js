import Swal from 'sweetalert2';

const $swal = Swal

function Dialog() {
  const self = this
  Object.assign(this, Swal)
  this.open = function (config) {
    return $swal.fire(config)
  }

  this.confirm = function (config, callback) {
    return this.open({
      title: 'Are you sure !',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      showLoaderOnConfirm: true,
      preConfirm: (login) => {
        if (login) {
          return callback(self)
        }
      },
      allowOutsideClick: () => !$swal.isLoading()
      , ...config
    }).then((result) => {
      if (!result.isDismissed) {
        return result
      }
      return false
    })
  }
}


export default new Dialog
