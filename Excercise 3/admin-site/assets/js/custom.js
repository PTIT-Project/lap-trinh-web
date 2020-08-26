function showMyNotification(from, align, message, type, icon, timer) {
  $.notify(
    {
      icon: icon,
      message: message
    },
    {
      type: type,
      timer: timer,
      placement: {
        from: from,
        align: align
      },
      z_index: 999999
    }
  );
}