import Selector from '@tools/Selector';

/**
 * The target of opening levers.
 */
export default class Target {
    /**
     * The panel key.
     *
     * @type string
     */
    private readonly panelKey: string;

    /**
     * The constructor.
     *
     * @param target { string }
     *   The panel key.
     */
    public constructor(target: string) {
        this.panelKey = target;
    }

    /**
     * Returns the panel key.
     *
     * @type string
     */
    public getPanelKey(): string {
        return this.panelKey;
    }

    /**
     * Tells about of validity.
     *
     * @type boolean
     */
    public isValid(): boolean {
        return Selector.panel(this.panelKey) !== null;
    }
}
