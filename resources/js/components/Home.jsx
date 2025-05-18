import Button from '@mui/material/Button';
import { useAuth } from '../hooks/AuthProvider';
import { Navigate } from 'react-router-dom';

export default function Home() {
    const auth = useAuth();
    const user = auth.user;

    if (user) {
        return <Navigate to="/products" />;
    }

    return <>
        <div className="flex items-center justify-center">
            <div className='me-4'>
                <Button variant="outlined" href='/login'>Login</Button>
            </div>
            <div>
                <Button variant="contained">Register</Button>
            </div>
        </div>
    </>;
}