 
import notie from 'notie';

export default {
  hideAlerts(){
    notie.hideAlerts(() => {});
  },
  toast(type = 'alert', options = {}) {
    // type - warning, success, error, info

    notie.hideAlerts(() => {});
    options.type = options.type || 'info';
    options.time = options.time || 5;

    if (
       
      options.type === 'error' &&
      (options.text === '' || typeof options.text === 'undefined')
    ) {
      options.text = 'Something went wrong, Please try again.';
    }

    if (options.type === 'success' && options.text === '') {
      options.text = 'Thank you, Your operation is successfully done.';
    }

    switch (type) {
      case 'alert':
        this.alert(options);
        break;
      default:
        this.alert(options);
        break;
    }
  },
  alert(options) {
    notie.alert({
      ...options,
    });
  },
};
