import {fileURLToPath, URL} from "node:url";
import {defineConfig} from "vite";
import vue from "@vitejs/plugin-vue";
import tailwindcss from 'tailwindcss';
import http from "http";
// https://vitejs.dev/config/
export default defineConfig({
  base: "",
  runtimeCompiler: true,
  plugins: [vue(), tailwindcss()],
  server: {
    port: 9200,
    proxy: {
      // string shorthand: http://localhost:5173/foo -> http://localhost:4567/foo
      '/api':
        {
          target: 'http://172.17.0.1:9100/cpn1234',
          changeOrigin: true,
          secure: false,
          headers: {cookie: 'Laravel_session=FRCm9jB1wsuNd4sRhPrxsGVF'},
        },

    }
  },
  build: {
    outDir: 'public',
    target: 'esnext'
  },
  configureWebpack: {
    resolve: {
      alias: {
        vue$: 'vue/dist/vue.esm-bundler.js',
      }
    }
  },
  resolve: {
    alias: {
      vue$: 'vue/dist/vue.esm-bundler.js',
      "@": fileURLToPath(new URL("./src", import.meta.url)),
    },
  },
});
