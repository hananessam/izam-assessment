import Button from '@mui/material/Button';
import { useAuth } from '../hooks/AuthProvider';
import { useNavigate } from 'react-router-dom';

export default function Products() {
    const navigate = useNavigate();
    const auth = useAuth();
    const user = auth.user;
    const token = auth.token;

    if (!user) {
        navigate('/');
    }

    return <>
        <div className="flex items-center justify-center">
            <div className='me-4'>
                <Button variant="outlined" href='/login' onClick={auth.logout}>Logout</Button>
            </div>
        </div>
    </>;
}