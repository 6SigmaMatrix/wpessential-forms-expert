import "element-plus/dist/index.css";
import "./wpessential-forms-expert.scss";
import ElementPlus from "element-plus";
import { createApp } from 'vue';
import App from './App.vue';

window.$ = jQuery;

const app = createApp( App );

app.use( ElementPlus );
app.config.globalProperties.$WPEssential = WPEssential;
app.config.globalProperties.$WPE_AJAX_URL = WPEssential.ajaxurl;
app.config.globalProperties.$WPE_NONCE = WPEssential.nonce;
app.config.globalProperties.$WPE_AJAX_PREFIX = WPEssential.ajaxurl_prefix;
app.config.productionTip = true;
app.config.performance = true;
app.config.devtools = true;
app.config.debug = true;
app.config.silent = true;
app.mount( '#wpessential-admin' );
