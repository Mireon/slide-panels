import Lever from './Lever';
import LeverClickListener from './LeverClickListener';
import Selector from '@scripts/Utilities/Selector';
import { Locations } from '@scripts/Utilities/Selector';

/**
 * ...
 */
class Levers {
    /**
     * ...
     *
     * @type Array<Lever>
     */
    private toShowLevers = new Array<Lever>();

    /**
     * ...
     *
     * @type Array<Lever>
     */
    private toHideLevers = new Array<Lever>();

    /**
     * The constructor.
     */
    private constructor() {
        this.initLevers();
    }

    /**
     * ...
     *
     * @return void
     */
    private initLevers(): void {
        Selector.element('lever', Locations.UBIQUITOUS).each((element: Element) => {
            const lever = new Lever(element);

            if (lever.toShow()) {
                this.toShowLevers.push(lever);
            } else if (lever.toHide()) {
                this.toHideLevers.push(lever);
            }
        });
    }

    /**
     * ...
     *
     * @param listener { LeverClickListener }
     *   ...
     *
     * @return void
     */
    public setToShowClickListener(listener: LeverClickListener): void {
        this.toShowLevers.forEach((lever: Lever) => lever.setClickListener(listener));
    }

    /**
     * ...
     *
     * @param listener { LeverClickListener }
     *   ...
     *
     * @return void
     */
    public setToHideClickListener(listener: LeverClickListener): void {
        this.toHideLevers.forEach((lever: Lever) => lever.setClickListener(listener));
    }
}

export default Levers;
