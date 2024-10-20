<?php
/**
 * Theme SVG Icons
 *
 * This template is placed after the body and shows the website icons.
 *
 * @package IconIoir
 * @version 7.8.0
 * @url https://iconoir.com/
 */

defined( 'ABSPATH' ) || exit;
?>

<svg xmlns="http://www.w3.org/2000/svg" id="sonnat" class="d-none">
	<symbol id="icon-search" viewBox="0 0 36 36" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M25.5 25.5L31.5 31.5"/><path d="M4.5 16.5C4.5 23.1274 9.87258 28.5 16.5 28.5C19.8195 28.5 22.8241 27.1522 24.9966 24.9739C27.1615 22.8033 28.5 19.8079 28.5 16.5C28.5 9.87258 23.1274 4.5 16.5 4.5C9.87258 4.5 4.5 9.87258 4.5 16.5Z"/></symbol>
	<symbol id="icon-arrow-start" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
		<path d="<?php echo is_rtl() ? 'M3 12L21 12M21 12L12.5 3.5M21 12L12.5 20.5' : 'M21 12L3 12M3 12L11.5 3.5M3 12L11.5 20.5'; ?>"></path>
	</symbol>
	<symbol id="icon-arrow-end" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
		<path d="<?php echo ! is_rtl() ? 'M3 12L21 12M21 12L12.5 3.5M21 12L12.5 20.5' : 'M21 12L3 12M3 12L11.5 3.5M3 12L11.5 20.5'; ?>"></path>
	</symbol>
</svg>