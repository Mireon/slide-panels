import Lever from '@modules/Levers/Lever';

/**
 * A click listener to lever.
 */
export default interface LeverClickListener {
    (lever: Lever): void;
}
