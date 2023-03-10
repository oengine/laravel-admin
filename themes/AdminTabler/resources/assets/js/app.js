import "@tabler/core/dist/js/tabler";
import { ToastsModule } from "./module/toasts";

if (window.ModulePlatform) {
  window.ModulePlatform.register("THEME_TOASTS_MODULE", new ToastsModule());
  window.showToast = function (
    message,
    title = undefined,
    postion = undefined,
    type = undefined
  ) {
    window.ModulePlatform.addMessage(message, "info", "showToast", {
      title,
      postion,
      type,
    });
  };
}
