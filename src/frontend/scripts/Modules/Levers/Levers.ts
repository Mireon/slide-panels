import Lever from '@modules/Levers/Lever';
import LeverClickListener from '@modules/Levers/LeverClickListener';
import Selector from '@tools/Selector';

/**
 * The set of levers.
 */
export default class Levers {
    /**
     * The list of levers to show.
     *
     * @type Array<Lever>
     */
    private readonly showLevers = new Array<Lever>();

    /**
     * The list of levers to hide.
     *
     * @type Array<Lever>
     */
    private readonly hideLevers = new Array<Lever>();

    /**
     * The constructor.
     */
    public constructor() {
        Selector.levers().forEach((element: Element) => {
            const lever = new Lever(element);

            if (lever.toShow()) {
                this.showLevers.push(lever);
            } else if (lever.toHide()) {
                this.hideLevers.push(lever);
            }
        });
    }

    /**
     * Sets the click listener on levers these for show.
     *
     * @param listener { LeverClickListener }
     *   A click listener to lever.
     *
     * @return void
     */
    public setShowClickListener(listener: LeverClickListener): void {
        this.showLevers.forEach((lever: Lever) => lever.setClickListener(listener));
    }

    /**
     * Sets the click listener on levers these for hide.
     *
     * @param listener { LeverClickListener }
     *   A click listener to lever.
     *
     * @return void
     */
    public setHideClickListener(listener: LeverClickListener): void {
        this.hideLevers.forEach((lever: Lever) => lever.setClickListener(listener));
    }
}
