import Button from '@mui/material/Button';
import { useAuth } from '../hooks/AuthProvider';
import { Box, Typography } from '@mui/material';
import { Outlet } from 'react-router-dom';
import Cart from './Cart';
import { useState } from 'react';

export default function Layout() {
    const auth = useAuth();
    const user = auth.user;
    const [cartOpen, setCartOpen] = useState(false);

    return <>
        <Box className="flex flex-col items-center justify-start h-[90vh] w-[100vw]">
            <Box className="flex items-center justify-between w-full max-w-4xl p-4 bg-white border-b border-gray-200">
                <Box>
                    <Typography className="text-3xl font-bold">Welcome {user?.name}</Typography>
                </Box>
                <Box className="flex items-center justify-center gap-4">
                    <Box>
                        {/* cart icon */}
                        <Button variant="outlined" onClick={() => {setCartOpen(true)}}>Cart</Button>
                    </Box>
                    <Button variant="outlined" onClick={auth.logout}>Logout</Button>
                </Box>
            </Box>

            <Box>
                <Cart cartOpen={cartOpen} setCartOpen={setCartOpen} />
            </Box>

            <Box className="w-full max-w-4xl p-4">
                <Outlet />
            </Box>
        </Box>
    </>;
}