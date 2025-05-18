import './bootstrap';

import ReactDOM from 'react-dom/client';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { createTheme, ThemeProvider, CssBaseline } from '@mui/material';
import Home from './components/Home';
import Login from './components/Login';
import Products from './components/Products';
import AuthProvider from './hooks/AuthProvider';
import PrivateRoute from './router/route';

import '@fontsource/roboto/300.css';
import '@fontsource/roboto/400.css';
import '@fontsource/roboto/500.css';
import '@fontsource/roboto/700.css';

const theme = createTheme({
    palette: {
        mode: 'light',
    }
});

ReactDOM.createRoot(document.getElementById('app')).render(
    <ThemeProvider theme={theme}>
        <CssBaseline /> 
        <BrowserRouter>
            <AuthProvider>
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/login" element={<Login />} />
                    <Route element={<PrivateRoute />}>
                        <Route path="/products" element={<Products />} />
                    </Route>
                </Routes>
            </AuthProvider>
        </BrowserRouter>
    </ThemeProvider>
);